@props(['name', 'authors', 'current_author' => ''])
<div class="mt-2 z-10 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
    <div class="py-2 px-2">
        <select name="{{ $name }}" class="text-sm">
        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ (isset($current_author) ? $current_author === $author->id : '') ? "selected" : '' }} class="text-gray-700 block px-4 py-2 text-sm">
                    {{ $author->name }}</option>
            @endforeach
        </select>
        <input type="hidden" value="Submit">
    </div>
</div>

