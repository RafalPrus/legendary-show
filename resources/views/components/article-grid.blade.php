@props(['articles'])
<div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 xl:gap-x-8">
    <x-article-feature-card :article="$articles[0]"/>
{{--    @if($articles->count() > 1)--}}
{{--        <div class="lg:grid lg:grid-cols-6">--}}
{{--            @foreach($articles->skip(1) as $article)--}}
{{--                <x-article-card--}}
{{--                    :article="$article"--}}
{{--                    class="{{$loop->iteration < 3 ? 'col-span-3' : 'col-span-2'}}"/>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
