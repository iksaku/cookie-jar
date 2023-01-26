<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class SetupCommand extends Command
{
    protected $signature = 'setup';

    protected $description = 'Basic demo application setup';

    public function handle()
    {
        $this->components->info('Preparing application.');

        $this->components->task('Migrating database', function () {
            $this->callSilent('migrate:fresh', ['--force' => true]);
        });

        $this->components->task('Create admin user', function () {
            User::firstOrCreate(['email' => 'admin@example.com'], [
                'name' => 'Admin',
                'password' => '$2y$10$g6BLE/4wlczRjA6lu.Cs5OsHZQBkpnQOUmBHlmMp11RE1FfesA4bq' // password
            ]);
        });

        $this->components->task('Linking public storage directory', function () {
            $this->callSilent('storage:link', ['--force' => true]);
        });

        $this->components->task('Ensuring \'jars\' directory is empty', function () {
            Storage::disk('public')->deleteDirectory('jars');
        });
    }
}
