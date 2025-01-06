<?php 
namespace Memorarl\Anvil;

use Illuminate\Support\ServiceProvider;
use Memorarl\Anvil\Commands\TestCommand;

class AnvilServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                TestCommand::class,
            ]);
        }
    }

    public function register()
    {
    }
}