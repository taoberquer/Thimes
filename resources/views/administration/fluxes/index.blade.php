@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-row mb-4" method="post" action="{{ route('administration.fluxes.store') }}">
            @csrf()
            <h4 class="col">Ajouter un flux</h4>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Entrer le titre" required value="{{ old ('title') }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="url">URL</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="Entrer l'url" required value="{{ old ('url') }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="ttl">TTL</label>
                        <input type="number" name="ttl" class="form-control" id="ttl" placeholder="Entrer le ttl" required value="{{ old ('ttl') }}">
                    </div>
                </div>
            </div>
        </form>
        <h4>Flux enregistrés</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">URL</th>
                <th scope="col">TTL</th>
                <th scope="col">Actif</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fluxes as $flux)
                <tr>
                    <th scope="row">{{ $flux->getId() }}</th>
                    <td>{{ $flux->getTitle() }}</td>
                    <td>{{ $flux->getUrl() }}</td>
                    <td>{{ $flux->getTtl() }}</td>
                    <td>
                        @if ($flux->isActive())
                            OUI
                        @else
                            NON
                        @endif
                    </td>
                    <td>
                        <div class="row justify-content-around">
                            <a href="{{ route('administration.fluxes.edit', $flux->getId()) }}">
                                <button type="submit" class="btn btn-info text-white">Modifier</button>
                            </a>
                            <form action="{{ route('administration.fluxes.destroy', $flux->getId()) }}" method="post">
                                @csrf()
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
