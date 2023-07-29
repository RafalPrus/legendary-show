@props(['article'])
<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-1 xl:gap-x-8">
    <a href="/articles/{{ $article->id }}" class="group">
        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
            <div class="col-span-2 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                <img src="{{ asset('/storage/images/br2.jpg') }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <div>
            <h3 class="mt-4 text-sm text-gray-700">{{ ucwords($article->name) }}</h3>
            <h4 class="mt-2 text-xs text-gray-500">{{ $article->excerpt }}</h4>
            <h4 class="mt-2 text-xs text-gray-600">{{ $article->release_year }}</h4>
            <x-badge class="text-xs">
                {{ $article->category->name }}
            </x-badge>
            </div>
        </div>
    </a>
</div>
