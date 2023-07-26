@props(['type' => '', 'name'])
<div class="mt-2">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        autocomplete="{{ $name }}"
        type="{{ $type ? $type : '' }}"
        required
        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
</div>
@error($name)
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror
