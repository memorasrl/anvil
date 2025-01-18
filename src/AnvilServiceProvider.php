<?php 
namespace Memorasrl\Anvil;

use Illuminate\Support\ServiceProvider;
use Memorasrl\Anvil\Commands\TestCommand;

class AnvilServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
        }
    }

    public function register()
    {
    }
}