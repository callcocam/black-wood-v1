<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/

namespace App\Models;

use App\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Sluggable\HasSlug;
use App\Scopes\UuidGenerate;

class AbstractModel extends Model
{
    use  SoftDeletes, HasSlug,UuidGenerate;
    
    public $incrementing = false;

    protected $keyType = "string";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     /**
     * @return string
     */
    protected function slugTo()
    {
        return "slug";
    }

    /**
     * @return string
     */
    protected function slugFrom()
    {
        return 'name';
    }

    /**
     * @return SlugOptions
     */
    public function getSlugOptions()
    {
        if (is_string($this->slugTo())) {
            return SlugOptions::create()
                ->generateSlugsFrom($this->slugFrom())
                ->saveSlugsTo($this->slugTo());
        }
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable')->orderByDesc('created_at');
    }

    public function cover(){
        return $this->morphOne(Image::class, 'imageable')->orderByDesc('created_at');
    }
    
    public function mobile(){
        return $this->morphOne(Image::class, 'imageable')->orderByDesc('created_at');
    }
    
    public function tablet(){
        return $this->morphOne(Image::class, 'imageable')->orderByDesc('created_at');
    }

    public function thumb(){
        return $this->morphOne(Image::class, 'imageable')->orderByDesc('created_at');
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function description(){
        return $this->morphOne(Description::class, 'descriptionable')->orderByDesc('created_at');
    }

    public function isUser(){
        return true;
    }
}
