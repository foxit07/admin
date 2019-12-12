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
        if(is_null(config('admin'))){
            $this->warn('Please publish the config file by running ' .
            ' \'php artisan vendor:publish --tag=press-config\'');
          /*  return false;*/
        }

        Seeder::run();
        exec('npm install');
        exec('npm run dev');


    }
}


