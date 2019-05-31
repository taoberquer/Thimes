@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-row mb-4" method="post" action="{{ route('administration.users.store') }}">
            @csrf()
            <h4 class="col">Ajouter un utilisateur</h4>
            <div class="col-auto">
                <button type="submit" class="btn btn-success">Ajouter</button>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="name">Nom</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Entrer le nom" required value="{{ old ('name') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Entrer l'email" required value="{{ old ('email') }}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Entrer le mot de passe" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password_confirmation">Confirmation mot de passe</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Entrer le mot de passe" required>
                    </div>
                </div>
            </div>
        </form>
        <h4>Utilisateurs inscrits</h4>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Club</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->getId() }}</th>
                    <td>{{ $user->getName() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td>
                        @if ($user->getClub())
                            {{ $user->getClub()->getName() }}
                        @else
                            Aucun club
                        @endif
                    </td>
                    <td>
                        <div class="row justify-content-around">
                            <a href="{{ route('administration.users.edit', $user->getId()) }}">
                                <button type="submit" class="btn btn-info text-white">Modifier</button>
                            </a>
                        <form action="{{ route('administration.users.destroy', $user->getId()) }}" method="post">
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
