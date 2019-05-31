@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-row" method="post" action="{{ route('administration.users.update', $user->getId()) }}">
            @csrf()
            @method('PUT')
            <h4 class="col">Modifier l'utilisateur</h4>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom" required value="{{ old ('name', $user->getName()) }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Entrer l'email" required value="{{ old ('email', $user->getEmail()) }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Entrer le mot de passe">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password_confirmation">Confirmation mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Entrer le mot de passe">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
