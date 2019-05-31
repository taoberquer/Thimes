@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-row" method="post" action="{{ route('administration.fluxes.update', $flux->getId()) }}">
            @csrf()
            @method('PUT')
            <h4 class="col">Modifier le flux</h4>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="title">Titre</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Entrer le titre" required value="{{ old ('title', $flux->getTitle()) }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="url">URL</label>
                        <input type="text" name="url" class="form-control" id="url" placeholder="Entrer l'url" required value="{{ old ('url', $flux->getUrl()) }}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="ttl">TTL</label>
                        <input type="number" name="ttl" class="form-control" id="ttl" placeholder="Entrer le ttl" required value="{{ old ('ttl', $flux->getTtl()) }}">
                    </div>
                    <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" value="1"
                            @if (old ('active', $flux->isActive()))
                                checked
                            @endif
                        >
                        <label class="custom-control-label" for="active">Activer le flux</label>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
