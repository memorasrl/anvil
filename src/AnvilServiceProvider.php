<?php 
namespace Memorasrl\Anvil;

use Illuminate\Support\ServiceProvider;
use Memorasrl\Anvil\Commands\InstallCommand;

class AnvilServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {

            // commands
            $this->commands([
                InstallCommand::class,
            ]);

            // publishable files
            $this->publishes([
                __DIR__.'/publishable/config/api.php' => config_path('api.php'),
                __DIR__.'/publishable/controllers' => app_path('Http/Controllers'),
                __DIR__.'/publishable/enums' => app_path('Enums'),
                __DIR__.'/publishable/factories' => database_path('factories'),
                __DIR__.'/publishable/migrations' => database_path('migrations'),
                __DIR__.'/publishable/models' => app_path('Models'),
                __DIR__.'/publishable/requests' => app_path('Http/Requests'),
                __DIR__.'/publishable/resources' => app_path('Http/Resources'),
            ], 'boilerplate');

        }
    }

    public function register()
    {
    }
}