<?php


namespace Foxit07\Admin;


use Foxit07\Admin\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AdminBaseServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if($this->app->runningInConsole()){
            $this->registerPublishing();
        }

        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            InstallCommand::class,
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        $this->registerRoutes();
    }

    protected function registerPublishing()
    {
        $this->publishes([__DIR__.'../config/admin.php' => config_path('admin.php')], 'admin-config');

        $this->publishes([__DIR__.'/../resources/publishable/assets' => public_path('foxit07/admin')], 'admin-assets');
        $this->publishes([__DIR__.'/../database/seeds' => database_path('seeds')], 'admin-seeds');
    }

    protected function registerRoutes()
    {
        Route::group($this->getRouteConfiguration(), function(){
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });
    }

    /**
     * @return mixed
     */
    protected function getRouteConfiguration()
    {
        return [
            'prefix' => 'admin',
            'middleware' => ['web'],
            'namespace' => 'Foxit07\Admin\Http\Controllers'
        ];
    }
}