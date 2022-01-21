<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Models\Auth;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use App\Models\AbstractModel;
use App\Models\Auth\Acl\Concerns\HasRolesAndPermissions;

class User extends AbstractModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, 
    HasProfilePhoto, HasRolesAndPermissions, WithInfo;

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //protected $with = ['contact', 'contacts', 'document', 'documents', 'social', 'socials', 'address', 'addresses'];

    public function getAccessAttribute()
    {
        $roles = $this->roles()->select(["name", "id"])->get();
        $data = [];
        foreach ($roles as $role){
            $data[]=$role->id;
        }
        return $data;
    }

    public function scopeRoles($query, $term)
    {
        return $query->whereHas('roles', function ($builder) use ($term) {
            $builder->where('id', $term);
        });
    }

    
    public function isUser(){
        return false;
    }
}
