@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="row p-3">
            <ul class="nav nav-tabs col">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('club.index') }}">Articles ajoutés au club</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('club.category.index') }}">Catégories liées au club</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('club.interesting.articles') }}">Articles qui peuvent vous intéresser</a>
                </li>
            </ul>
            <a href="{{ route('clubs.rss', $club->getId()) }}">
                <button class="btn btn-info text-white">Afficher le flux Rss</button>
            </a>
        </div>

        <section class="row p-4">
            @foreach($club->getSports as $sport)
                <div class="card col-md-3 col-sm-12">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $sport->getName() }}</h5>
                        <form action="{{ route('club.category.removeCategoryArticle', $sport->getId()) }}" method="post">
                            @csrf()
                            <button type="submit" class="btn btn-danger">Retirer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
