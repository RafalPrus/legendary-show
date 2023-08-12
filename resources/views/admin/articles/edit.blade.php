<x-layout heading="Edit Article">
    <form action="/admin/articles/{{ $article->id }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Article: {{ $article->name }}</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Cover</label>
                        <div class="mt-2 flex items-center gap-x-3">
                            {{-- Avatar image --}}
                            <img class="h-16" src="{{ $article->getFirstMediaUrl('covers') ? $article->getFirstMediaUrl('covers') : asset('storage/images/default_cover.jpg') }}" alt="">
                            <input type="file" id="cover" name="cover"/>
                            @error('cover')
                            <p class="text-red-400 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="name"/>
                        <x-form.input name="name" type="text" :value="$article->name"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="excerpt"/>
                        <x-form.input name="excerpt" type="text" :value="$article->excerpt"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="description"/>
                        <x-form.textarea name="description" :value="$article->description"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="year"/>
                        <x-form.input name="release_year" type="text" :value="$article->release_year"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="type"/>
                        <x-form.dropdown-article-types name="type_id" :current_tpe="$article->type->id" :types="$types"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="author"/>
                        <x-form.dropdown-article-author name="author_id" :current_author="$article->author->id" :authors="$authors"/>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <x-form.label name="category"/>
                        <x-form.dropdown-article-category name="category_id" :current_category="$article->category->id" :categories="$categories"/>
                    </div>
                </div>
                @error('success')
                <p class="text-green-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ url()->previous() }}" class="text-sm font-semibold leading-6 text-gray-900">Back</a>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>

