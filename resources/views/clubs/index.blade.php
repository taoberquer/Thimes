@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($clubs as $club)
                <div class="col-md-3 col-sm-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header text-center"><a href="{{ route('clubs.show', $club->getId()) }}">{{ $club->getName() }}</a></div>
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
