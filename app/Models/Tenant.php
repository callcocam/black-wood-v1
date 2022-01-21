<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Tenant\Actions\ForgetCurrentTenantAction;
use App\Tenant\Actions\MakeCurrentTenantAction;
use App\Tenant\TenantCollection;
use App\Tenant\Concerns\UsesLandlordConnection;

class Tenant extends AbstractModel
{
    use HasFactory, UsesLandlordConnection;

    public function makeCurrent(): self
    {

        if ($this->isCurrent()) {
            return $this;
        }

        static::forgetCurrent();
        $this
            ->getMultitenancyActionClass('make_tenant_current_action', MakeCurrentTenantAction::class)
            ->execute($this);

        return $this;
    }

    public function forget(): self
    {
        $this
            ->getMultitenancyActionClass('forget_current_tenant_action', ForgetCurrentTenantAction::class)
            ->execute($this);

        return $this;
    }

    public static function current()
    {
        $containerKey = config('tenant.current_tenant_container_key');

        if (!app()->has($containerKey)) {
            return null;
        }

        return app($containerKey);
    }

    public static function checkCurrent(): bool
    {
        return static::current() !== null;
    }

    public function isCurrent(): bool
    {
        return optional(static::current())->id === $this->id;
    }

    public static function forgetCurrent()
    {
        $currentTenant = static::current();

        if (is_null($currentTenant)) {
            return null;
        }

        $currentTenant->forget();

        return $currentTenant;
    }

    public function getDatabaseName()
    {
        return $this->database;
    }

    public function newCollection(array $models = [])
    {

        return new TenantCollection($models);
    }

    public function execute(callable $callable)
    {
        $originalCurrentTenant = Tenant::current();

        $this->makeCurrent();

        return tap($callable($this), static function () use ($originalCurrentTenant) {
            $originalCurrentTenant
                ? $originalCurrentTenant->makeCurrent()
                : Tenant::forgetCurrent();
        });
    }

}
