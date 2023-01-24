<x-card title="Test">
    <x-slot:actions>
        <input
            id="jar-upload"
            type="file"
            class="hidden"
            wire:model="uploads"
            multiple
        >

        @unless($this->images->isEmpty())
            <label for="jar-upload" class="cursor-pointer relative inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" >
                Upload
            </label>
        @endunless
    </x-slot:actions>

    @if($this->images->isEmpty())
        <x-input.file-upload.jar-upload />
    @else
        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach($this->images as $image)
                <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                    <img
                        class="h-full w-full object-cover object-center"
                        src="{{ $image->url }}"
                    >
                </div>
            @endforeach
        </div>
    @endif
</x-card>
