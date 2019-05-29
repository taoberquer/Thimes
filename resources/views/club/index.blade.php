@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="row p-3">
            <ul class="nav nav-tabs col">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Afficher les articles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Ajouter de nouveaux aritcles</a>
                </li>
            </ul>
            <a href="{{ route('clubs.rss', $club->getId()) }}">
                <button class="btn btn-info text-white">Afficher le flux Rss</button>
            </a>
        </div>

        <section class="row p-4">
            @foreach($club->articles as $article)
                <div class="card col-12">
                    <div class="card-body row">
                        <div class="col-12">
                            <div class="row">
                                <h5 class="card-title col"><a href="#">Titre de l'article</a></h5>
                                <a href="#" class="card-link col-auto">
                                    <button class="btn btn-danger">Supprimmer du club</button>
                                </a>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 col-12"><a href="#" class="text-muted small">Source de l'article</a></h6>
                        <p class="card-text col-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error est excepturi, id impedit libero, minus mollitia nesciunt odio pariatur perferendis quam quis recusandae rerum similique sint tempore, tenetur ut veritatis.</p>
                    </div>
                </div>
            @endforeach
        </section>
    </div>
@endsection
