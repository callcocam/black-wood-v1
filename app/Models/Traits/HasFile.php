<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Models\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

trait HasFile
{

    /**
     * Update the user's profile file.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @return void
     */
    public function updateFile(UploadedFile $file, $name = "url")
    {  
        tap($this->file, function ($previous) use ($file, $name) {
            $nameFile = \Str::beforeLast($file->getClientOriginalName(), '.');
            $nameFile = \Str::slug($nameFile);
            $nameFile = sprintf("%s.%s", $nameFile,$file->getClientOriginalExtension());
            $data['name'] = $nameFile;
            $data[$name] = $file->storePubliclyAs($this->getTable(),$nameFile, ['disk' => $this->fileDisk()]);
            $this->forceFill($data)->save();
            if ($previous) {
                Storage::disk($this->fileDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile file.
     *
     * @return void
     */
    public function deleteFile($name="file")
    {
        if (isset($this->file)) {
            if ($this->file && $this->file->url) {
                Storage::disk($this->fileDisk())->delete(\Arr::get($this->file,$name));
                $this->forceFill([
                    $name => null,
                ])->save();
            }
        }

    }

    /**
     * Get the URL to the user's profile file.
     *
     * @return string
     */
    public function getFileUrlAttribute()
    {
        if(!$this->file){
            return $this->defaultFileUrl();
        }
        if (\Str::contains($this->file->url,"http")) {
            return $this->file->url;
         }

        $image = Storage::disk($this->fileDisk())->url($this->file->url);
        if (in_array(request()->getHost(), ['localhost', '127.0.0.1'])) {
            $host = Str::beforeLast($image, "/storage");
            return $this->file
                ? Str::afterLast($image, $host)
                : $this->defaultFileUrl();
        }
       
        return $this->file
            ? Storage::disk($this->fileDisk())->url($this->file->url)
            : $this->defaultFileUrl();
    }

    /**
     * Get the default profile file URL if no profile file has been uploaded.
     *
     * @return string
     */
    protected function defaultFileUrl()
    {
        return null;
    }

    /**
     * Get the disk that profile files should be stored on.
     *
     * @return string
     */
    protected function fileDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('siga.image_disk', 'public');
    }

    
  public function file(){
    return $this->morphMany(\App\Models\File::class, 'fileable')->orderByDesc('created_at');
  } 

  public function url(){
    return $this->morphMany(\App\Models\File::class, 'fileable')->orderByDesc('created_at');
  } 
}
