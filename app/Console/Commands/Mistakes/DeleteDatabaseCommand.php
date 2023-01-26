<?php

namespace App\Console\Commands\Mistakes;

use Illuminate\Console\Command;

class DeleteDatabaseCommand extends Command
{
    protected $signature = 'mistake:database';

    protected $description = 'Tear down the Database';

    public function handle()
    {
        $this->callSilent('migrate:reset', ['--force' => true]);

        $this->components->info('Destroyed database... Oops!');
    }
}
