<x-layout heading="HOME">
    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8">
                @for($i = 0; $i < 3; $i++)
                    <x-article :article="$articles[$i]"/>
                @endfor
                <!-- More products... -->
            </div>
            <div class="grid mt-6 grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach($articles->skip(3) as $article)
                    <x-article :article="$article"/>
                @endforeach
                <!-- More products... -->
            </div>
        </div>
    </div>

</x-layout>
