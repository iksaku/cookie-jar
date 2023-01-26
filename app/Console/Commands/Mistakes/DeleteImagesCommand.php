<?php

namespace App\Console\Commands\Mistakes;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteImagesCommand extends Command
{
    protected $signature = 'mistake:images';

    protected $description = 'Delete stored images';

    public function handle()
    {
        Storage::disk('public')->deleteDirectory('jars');

        $this->components->info('Destroyed image\'s directory... Oops!');
    }
}
