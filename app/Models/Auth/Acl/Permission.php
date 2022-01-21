<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Models\Auth\Acl;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\AbstractModel;
use App\Models\Auth\Acl\Concerns\RefreshesPermissionCache;
use App\Models\Menu;
use App\Tenant\Concerns\UsesLandlordConnection;

class Permission extends AbstractModel implements Contracts\Permission
{
    use RefreshesPermissionCache, UsesLandlordConnection, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    public function isUser()
    {
        return false;
    }

    protected function slugTo()
    {
        return false;
    }

    /**
     * Permissions can belong to many roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(config('acl.models.role'))->withTimestamps();
    }

}
