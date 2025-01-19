<?php
 
namespace Anvil\Commands;
 
use Illuminate\Console\Command;
 
class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anvil:install';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializes anvil project base boilerplate';
 
    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Hello fellow user!');
    }
}