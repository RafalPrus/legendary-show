@props(['articles'])
<x-layout heading="HOME">
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">
            <x-article-grid :articles="$articles"/>
            <!-- More products... -->
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-layout>
