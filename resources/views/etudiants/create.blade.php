@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/" class="btn btn-outline-primary btn-sm">Retourner</a>
                <h1 class="display-one">
                    Ajoutez un nouveau étudiant</h1>
                <h2>{{ $status ?? '' }}</h2>
                <hr>
                <br>
                <br>
                <form id="create-frm" class="" action="" method="POST">
                    @method('POST')
                    @csrf
                    <button class="btn btn-primary">Créer l'étudiant</button>
                </form>

                <form name="ajouter-etudiant-post-form" id="ajouter-etudiant-post-form" method="post"
                      action="{{url('/etudiants/creer/etudiant')}}">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for=email>Courriel éléctronique</label>
                        <input type="email" id="email" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label for="date_de_naissance">Date de Naissance</label>
                        <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control"
                               required=""/>
                    </div>
                    <div class="form-group">
                        <label for="villeId">Votre Ville</label>
                        <select id="villeId" name="villeId">
                            @forelse($villes as $ville)
                                <option value="{{ $ville->id}}">{{ucfirst( $ville->nom )}}</option>
                            @empty <p class="text-warning">
                                Aucune Ville enregistrée </p>
                            @endforelse
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


            </div>
        </div>
    </div>
@endsection
