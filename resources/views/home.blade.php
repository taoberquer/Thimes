@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Main Content -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        @foreach($articles as $article)
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

                    <div class="col-md-4">
                        <div class="card my-4">
                            <h5 class="card-header">Sources</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($fluxes as $flux)
                                                <li><a href="{{ route('flux.index', $flux->getId()) }}">{{ $flux->getTitle() }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <h5 class="card-header">Sports</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled mb-0">
                                            @foreach($sports as $sport)
                                                <li><a href="{{ route('sport.index', $sport->getId()) }}">{{ $sport->getName() }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="pagination-bar text-center">
                           {{ $articles->links() }}
                    </div>
                </div>
                <!-- /.container -->
@endsection
