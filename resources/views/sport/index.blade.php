@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white pl-3 pr-3 pt-3 pb-1 mb-4">
            <div class="col-6 mx-auto">
                <div class="row justify-content-center">
                    <h4 class="col-auto text-dark pt-2">{{ $sport->getName() }}</h4>
                    @if (Auth::check() AND Auth::user()->getClub())
                        @if (Auth::user()->getClub()->getSports()->get()->where('id', $sport->getId())->first())
                            <form action="{{ route('club.category.removeCategoryArticle', $sport->getId()) }}" method="post" class="text-right">
                                @csrf()
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-danger"><span class="font-weight-bold">x</span></button>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('club.category.addCategoryToClub', $sport->getId()) }}" method="post" class="text-right">
                                @csrf()
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success"><span class="font-weight-bold">+</span></button>
                                </div>
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @foreach($sport->getArticles() as $article)
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
                        <a href="{{ route('sport.index', $sport->getId()) }}">{{ $sport->getName() }}</a>
                    @endforeach
                </p>
                <p class="post-meta">
                    <a href="{{ route('flux.index', $article->getFlux()->getId()) }}">{{ __('article.postedBy', ['flux' => $article->getFlux()->getTitle()]) }}</a>

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
