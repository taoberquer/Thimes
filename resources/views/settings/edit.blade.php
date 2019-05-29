@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('settings.update') }}" method="post" class="form-row">
            @csrf()
            @method('PUT')
            <div class="form-group col-md-6 col-sm-12">
                <label for="email">Adresse email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email" required value="{{ old('email', $user->getEmail()) }}">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="name">Nom <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Entrez votre nom" required value="{{ old('name', $user->getName()) }}">
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp" placeholder="Entrez votre mot de passe">
                <small id="emailHelp" class="form-text text-muted">Ne pas remplir si vous ne voulez pas le modifier</small>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="password_confirmation">Confirmation mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe">
            </div>
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
