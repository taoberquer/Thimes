@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-md-6 col-sm-12 mx-auto">
                <div class="card-body">
                    <h5 class="card-title text-center">Créer un club</h5>
                    <form action="{{ route('club.store') }}" method="post" class="form-row">
                        @csrf()
                        <div class="form-group col-12">
                            <label for="name">Nom du club</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Entrer le nom du club">
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-between">
                                <a href="{{ route('home') }}" class="col-auto">
                                    <button class="btn btn-danger">Annuler</button>
                                </a>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success">Créer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
