@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white pl-3 pr-3 pt-3 pb-1 mb-4">
            <a href="{{ $flux->getUrl() }}">
                <h4 class="text-center text-dark">{{ $flux->getTitle() }}</h4>
            </a>
        </div>
        @foreach($flux->getArticles() as $article)
            <div class="post-preview">
                <a href="{{ $article->getUrl() }}">
                    <h2 class="post-title">
                        {{ $article->getTitle() }}
                    </h2>
                </a>
                <p>
                    {{ $article->getDescription() }}
                </p>
                <p>Catégorie(s) :
                    @foreach( $article->sports() as $sport)
                        {{ $sport->getName() }}
                    @endforeach
                </p>
                <p class="post-meta">
                    {{ __('article.postedBy', ['flux' => $article->getFlux()->getTitle()]) }}

                    {{ __('article.postedThe', [
                    'date' => $article->getPubDateWithFormat('DD/MM/Y'),
                    'hour' => $article->getPubDateWithFormat('HH:mm')]) }}
                </p>
            </div>
            @if (Auth::check() AND Auth::user()->getClub())
                @if (Auth::user()->getClub()->articles()->get()->where('id', $article->getId())->first())
                    <form action="{{ route('club.removeAddedArticle', $article->getId()) }}" method="post" class="text-right">
                        @csrf()
                        <button type="submit" class="btn btn-danger">Retirer du club</button>
                    </form>
                @else
                    <form action="{{ route('club.addArticleToClub', $article->getId()) }}" method="post" class="text-right">
                        @csrf()
                        <button type="submit" class="btn btn-success">Ajouter au club</button>
                    </form>
                @endif
            @endif
            <hr>
        @endforeach
    </div>
@endsection
