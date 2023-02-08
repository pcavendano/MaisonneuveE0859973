@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container">
            <!-- Navigation -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <a href="/" class="btn btn-outline-primary btn-sm">Retourner</a>
            </div>
            <!-- Title -->
            <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                <h2 class="h5 mb-3 mb-lg-0"> Ajoutez un nouveau étudiant</h2>
            </div>

            <!-- Main content -->
            <div class="row">
                <!-- Left side -->
                <div class="col-lg-8">
                    <!-- Verifiaction et affichage des messages d'erreur -->

                    <!-- Basic information -->
                    <form enctype="multipart/form-data" name="ajouter-etudiant-post-form" id="ajouter-etudiant-post-form" method="post"
                          action="{{url('/etudiants/creer/etudiant')}}">
                        @csrf
                        @method('POST')
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Basic information</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Prénom</label>
                                            <input id="nom" name="nom"  type="text" class="form-control" value="{{ old('nom') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="date_de_naissance">Date de Naissance</label>
                                            <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control"
                                                   required="" value="{{ old('date_de_naissance') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Courriel éléctronique</label>
                                            <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Numéro de téléphone</label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Inscrivez votre adresse</h3>
                                <div class="mb-3">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <input id="adresse" name="adresse" type="text" class="form-control" value="{{ old('adresse') }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="villeId">Ville</label>
                                            <select class="select2 form-control select2-hidden-accessible" aria-hidden="true" id="villeId" name="villeId" >
                                                @forelse($villes as $ville)
                                                    <option value="{{ $ville->id}}">{{ucfirst( $ville->nom )}}</option>
                                                @empty <p class="text-warning">
                                                    Aucune Ville enregistrée </p>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary col-lg-4">Submit</button>
                </div>

                <!-- Right side -->
                <div class="col-lg-4">
                    <!-- Avatar -->
                    <!-- https://www.webtrickshome.com/forum/how-to-display-uploaded-image-in-html-using-javascript -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Choisissez votre image de profil</h3>
                            <label for="image" >Upload Image</label>
                            <input class="form-control" type="file"  accept="image/*" name="image" id="file">
                            @if ($errors->has('image'))
                                <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card mb-4 avatar">
                        <img class="avatar-img rounded-circle" id="output" />
                    </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection
