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

trait HasCover
{

    /**
     * Update the user's profile photo.
     *
     * @param \Illuminate\Http\UploadedFile $photo
     * @return void
     */
    public function updateCover(UploadedFile $photo, $name = "cover")
    {
        tap($this->image, function ($previous) use ($photo, $name) {
            $nameFile = \Str::beforeLast($photo->getClientOriginalName(), '.');
            $nameFile = \Str::slug($nameFile);
            $nameFile = sprintf("%s.%s", $nameFile,$photo->getClientOriginalExtension());
            $data['name'] = $nameFile;
            $data[$name] = $photo->storePubliclyAs($this->getTable(), $nameFile, ['disk' => $this->imageDisk()]);
            $this->forceFill($data)->save();
            if ($previous) {
                Storage::disk($this->imageDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteCover($name="cover")
    {
        if (isset($this->image)) {
            if ($this->image && $this->image->cover) {
                Storage::disk($this->imageDisk())->delete(\Arr::get($this->image,$name));
                $this->forceFill([
                    $name => null,
                ])->save();
            }
        }

    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getMobileUrlAttribute()
    {
        return $this->make('mobile');
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getCoverUrlAttribute()
    {
        return $this->make('cover');
    }

    protected function make($type){
        if(!$this->image){
            return $this->defaultCoverUrl();
        }
        $image = \Arr::get( $this->image, $type);
        if (\Str::contains($image,"http")) {
            return $image;
         }

        $image = Storage::disk($this->imageDisk())->url($image);
        if (in_array(request()->getHost(), ['localhost', '127.0.0.1'])) {
            $host = Str::beforeLast($image, "/storage");
            return Str::afterLast($image, $host);
        }
        return $image;
    }
    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultCoverUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode(Uuid::uuid4()->toString()) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function imageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('siga.image_disk', 'public');
    }
}
