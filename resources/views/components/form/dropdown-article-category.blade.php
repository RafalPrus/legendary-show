@props(['name', 'categories', 'current_category' => ''])
<div class="mt-2 z-10 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
    <div class="py-2 px-2">
        <select name="{{ $name }}" class="text-sm">
        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (isset($current_category) ? $current_category === $category->id : '') ? "selected" : ''}}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        <input type="hidden" value="Submit">
    </div>
</div>

