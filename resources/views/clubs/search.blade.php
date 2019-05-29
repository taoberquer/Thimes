@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="bg-white p-3 mb-5">
            <h5>Résulat de la recherche</h5>
        </div>
        <div class="row">
            @if ($clubs->get()->count() == 0)
                <p class="text-center col-12">Aucun résulat</p>
            @endif
            @foreach($clubs->get() as $club)
                <div class="col-md-3 col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header text-center">{{ $club->getName() }}</div>
                        <div class="card-body text-center">
                            <a href="{{ route('clubs.rss', $club->getId()) }}">
                                <button class="btn btn-info text-white">Voir le flux Rss</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
