<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Tenant;


use Illuminate\Support\ServiceProvider;
use App\Tenant\Concerns\Config\UsesMultitenancyConfig;
use App\Tenant\Tasks\Collections\TasksCollection;
use App\Tenant\Concerns\UsesTenantModel;
use App\Tenant\TenantFinder;
use Illuminate\Support\Facades\Config;
use App\Tenant\TenantFinder as TenantFinderAlias;

class TenantServiceProvider  extends ServiceProvider
{
    use UsesTenantModel,
    UsesMultitenancyConfig;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         if (!$this->app->runningInConsole())
           $this->registerTenantFinder()->registerTasksCollection()->configureRequests();
    }

    
    protected function registerTasksCollection(): self
    {
        $this->app->singleton(TasksCollection::class, function () {
            $taskClassNames = config('tenant.switch_tenant_tasks');
            return new TasksCollection($taskClassNames);
        });

        return $this;
    }

    protected function registerTenantFinder(): self
    {
        if (config('tenant.tenant_finder')) {
            $this->app->bind(TenantFinder::class, config('tenant.tenant_finder'));
        }
        return $this;
    }

    protected function configureRequests(): self
    {
        $this->determineCurrentTenant();

        return $this;
    }
    protected function determineCurrentTenant()
    {

        if (!config('tenant.tenant_finder')) {
            return;
        }

        /** @var TenantFinderAlias $tenantFinder */
        $tenantFinder = app(TenantFinder::class);

        $tenant = $tenantFinder->findForRequest(request());

        if (!$tenant) {
            abort("400", sprintf('Nenhum tenant cadastrado para %s', request()->getHost()));
        }

        Config::set('fortify.home', sprintf("/%s", $tenant->prefix));
        Config::set('database.default', $tenant->provider);
       // Config::set('auth.providers.users.model', config(sprintf('tenant.user.model.%s', $tenant->provider)));

        optional($tenant)->makeCurrent();
    }

}
