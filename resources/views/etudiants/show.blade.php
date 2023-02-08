@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 pt-2"><a href="/" class="btn btn-outline-primary btn-sm">Retourner</a>
                <h1 class="display-one">{{ ucfirst($etudiant->nom) }}</h1>
                <p>{!! $etudiant->adresse !!}</p>
                <hr>
                <a href="/etudiant/{{ $etudiant->id }}/edit" class=
                "btn btn-outline-primary">Modifier l'étudiant</a>
                <br>
                <br>
                <form id="delete-frm" class="" method="DELETE" action="{{url('etudiant')}}">
                    @method('DELETE')
                    @csrf
                    <div class="form-group">
                        <label for="id" hidden>Id</label>
                        <input type="text" id="id" name="id" class="form-control" required=""
                               value="{{ $etudiant->id }}" hidden>
                    </div>
                    <button class=
                            "btn btn-danger">Supprimer l'étudiant
                    </button
                    >
                </form
                >
            </div
            >
        </div
        >
    </div
    >@endsection
