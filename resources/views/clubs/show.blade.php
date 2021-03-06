@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="text-right p-3">
            <a href="{{ route('clubs.rss', $club->getId()) }}">
                <button class="btn btn-info text-white">Afficher le flux Rss</button>
            </a>
        </div>

        <section class="row p-4">
            @foreach($club->articles as $article)
                <div class="card col-12 mb-4">
                    <div class="card-body row">
                        <div class="col-12">
                            <div class="row">
                                <h5 class="card-title col"><a href="{{ $article->getUrl() }}">{{ $article->getTitle() }}</a></h5>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 col-12"><a href="{{ $article->getFlux()->getUrl() }}" class="text-muted small">{{ $article->getFlux()->getTitle() }}</a></h6>
                        <p class="card-text col-12">{{$article->getDescription()}}</p>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
