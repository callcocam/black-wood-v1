<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tenant\Actions;

use App\Models\Tenant;
use App\Tenant\Events\MakingTenantCurrentEvent;
use App\Tenant\Tasks\Collections\TasksCollection;
use App\Tenant\Tasks\SwitchTenantTask;

class MakeCurrentTenantAction
{
    protected $tasksCollection;

    public function __construct(TasksCollection $tasksCollection)
    {
       
        $this->tasksCollection = $tasksCollection;
    }

    public function execute(Tenant $tenant)
    {
        event(new MakingTenantCurrentEvent($tenant));

        $this
            ->performTasksToMakeTenantCurrent($tenant)
            ->bindAsCurrentTenant($tenant);

        event(new MakingTenantCurrentEvent($tenant));

        return $this;
    }

    protected function performTasksToMakeTenantCurrent(Tenant $tenant): self
    {
        $this->tasksCollection->each(function (SwitchTenantTask $task) use ($tenant) {
            return $task->makeCurrent($tenant);
        });

        return $this;
    }

    protected function bindAsCurrentTenant(Tenant $tenant): self
    {
        $containerKey = config('tenant.current_tenant_container_key');

        app()->forgetInstance($containerKey);

        app()->instance($containerKey, $tenant);

        return $this;
    }
}
