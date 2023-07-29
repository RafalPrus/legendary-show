@props(['articles'])
@foreach($articles as $article)
    <x-article-feature-card :article="$article"/>
@endforeach
