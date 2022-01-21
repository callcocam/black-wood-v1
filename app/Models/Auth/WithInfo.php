<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models\Auth;


use App\Models\Address;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Social;

trait WithInfo
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function document()
    {
        return $this->morphOne(Document::class, 'documentable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function social()
    {
        return $this->morphOne(Social::class, 'socialable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function socials()
    {
        return $this->morphMany(Social::class, 'socialable')->orderByDesc('created_at');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable')->orderByDesc('created_at');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable')->orderByDesc('created_at');
    }
}
