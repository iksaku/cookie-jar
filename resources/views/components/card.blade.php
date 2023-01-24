<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <div class="-ml-4 -mt-2 flex flex-wrap items-center justify-between sm:flex-nowrap">
            <div class="ml-4 mt-2">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    {{ $title }}
                </h3>
            </div>

            @isset($actions)
                <div class="ml-4 mt-2 flex-shrink-0">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>

    <div class="px-4 py-5">
        {{ $slot }}
    </div>
</div>
