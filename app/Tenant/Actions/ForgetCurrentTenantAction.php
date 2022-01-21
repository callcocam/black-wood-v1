<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tenant\Actions;


use App\Models\Tenant;
use App\Tenant\Events\ForgettingCurrentTenantEvent;
use App\Tenant\Tasks\Collections\TasksCollection;
use App\Tenant\Tasks\SwitchTenantTask;

class ForgetCurrentTenantAction
{
    private $tasksCollection;

    public function __construct(TasksCollection $tasksCollection)
    {
        $this->tasksCollection = $tasksCollection;
    }

    public function execute(Tenant $tenant)
    {
        event(new ForgettingCurrentTenantEvent($tenant));

        $this
            ->performTaskToForgetCurrentTenant()
            ->clearBoundCurrentTenant();

        event(new ForgettingCurrentTenantEvent($tenant));
    }

    protected function performTaskToForgetCurrentTenant(): self
    {
        $this->tasksCollection->each(function (SwitchTenantTask $task) {
            return $task->forgetCurrent();
        });

        return $this;
    }

    private function clearBoundCurrentTenant()
    {
        $containerKey = config('tenant.current_tenant_container_key');

        app()->forgetInstance($containerKey);
    }
}