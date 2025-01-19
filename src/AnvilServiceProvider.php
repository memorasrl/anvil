<?php 
namespace Memorasrl\Anvil;

use Illuminate\Support\ServiceProvider;
use Memorasrl\Anvil\Commands\InstallCommand;

class AnvilServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    public function register()
    {
    }
}