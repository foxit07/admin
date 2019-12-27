<?php


namespace Foxit07\Admin\Console;


use Illuminate\Console\Command;
use Illuminate\Database\Seeder;

class InstallCommand extends Command
{
    protected $signature = "admin:install";

    protected $description = "Install Admin package.";

    public function handle()
    {

        $this->call('vendor:publish', [
            '--force' => true,
            '--tag' => 'admin-config'
        ]);

    }
}


