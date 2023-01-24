<?php

namespace App\Http\Livewire;

use App\Models\Jar;
use App\Models\JarImage;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/**
 * @property-read Jar $cookieJar
 * @property-read Collection<JarImage> $images
 */
class CookieJar extends Component
{
    use WithFileUploads;

    /** @var TemporaryUploadedFile[] */
    public $uploads = [];

    public function mount(): void
    {
        Jar::query()->firstOrCreate([
            'name' => 'cookies'
        ]);
    }

    public function updatedUploads() {
        $saved = [];

        foreach ($this->uploads as $upload) {
            $saved[] = [
                'path' => $upload->storePublicly('/jars/cookies', 'public'),
            ];
        }

        $this->cookieJar->images()->createMany($saved);

        $this->uploads = [];
    }

    public function getCookieJarProperty()
    {
        return Jar::query()
            ->where('name', 'cookies')
            ->first();
    }

    public function getImagesProperty()
    {
        return $this->cookieJar->images;
    }

    public function render(): View
    {
        return view('livewire.cookie-jar');
    }
}
