@props(['article'])
<div class="col-span-6 grid gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
    <a href="/articles/{{ $article->id }}" class="group col-span-3 grid xl:grid-cols-3">
        <div class="col-span-2 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-6 xl:aspect-w-7">
                <img src="{{ $article->getFirstMediaUrl('covers') ? $article->getFirstMediaUrl('covers') : asset('storage/images/default_cover.jpg') }}" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full max-h-96 object-cover object-left-top group-hover:opacity-75">
        </div>
        <div class="col-span-1 ml-6 relative">
            <div class="absolute bottom-0 left-">
            <h2 class="mt-4 text-m text-gray-900">Recently added</h2>
            <h3 class="mt-4 text-xl text-gray-700">{{ ucwords($article->name) }}</h3>
            <h4 class="mt-2 text-l text-gray-500">{{ $article->excerpt }}</h4>
            <h4 class="mt-2 text-m text-gray-600">{{ $article->release_year }}</h4>
            <x-badge class="text-xs text-indigo-600">
                {{ $article->category->name }}
            </x-badge>
            <x-badge class="text-xs text-gray-600">
                {{ $article->type->name }}
            </x-badge>
            </div>
        </div>
    </a>
</div>

{{--<span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">--}}
