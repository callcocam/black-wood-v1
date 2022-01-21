<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tenant\Tasks;


use App\Models\Tenant;

interface SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant);

    public function forgetCurrent();
}
