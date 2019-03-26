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

                            <p class="post-meta">
                                {{ __('article.postedBy', ['flux' => $article->getFlux()->getTitle()]) }}

                                {{ __('article.postedThe', [
                                'date' => $article->getPubDateWithFormat(),
                                'hour' => $article->getPubDateWithFormat('H:m')]) }}

                            </p>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                    <div class="col-md-4">
                        <!-- a voir si on garde la barre de recherche dans un aside ou on la place dans la navbar -->
                        <div class="card my-4">
                            <h5 class="card-header">Rechercher</h5>
                            <div class="card-body">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recherche pour...">
                                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <h5 class="card-header">Sources</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">L'Est Républicain</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Le Républicain Lorrain</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Vosges Matin</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Les Dernières Nouvelles d’Alsace</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">L’Alsace Le Pays</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card my-4">
                            <h5 class="card-header">Catégories</h5>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Football</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Basketball</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Tennis</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Curling sur gazon</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Badminton</a>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="" value="" />
                                                <a href="#">Ski</a>
                                            </li>
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
