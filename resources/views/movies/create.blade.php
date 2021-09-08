@extends('layout')

@section('content')
<form action=" {{route('film.store')}} " method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
        <label for="description">Description du film</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>
    <div class="form-group">
        <label for="année_de_sortie">Année de sortie</label>
        <input type="number" class="form-control" id="année_de_sortie" name="année_de_sortie">
    </div>
    <div class="form-group">
        <label for="duree">Durée du film (en minutes)</label>
        <input type="number" class="form-control" id="duree" name="duree">
    </div>
    <div class="form-group">
        <label for="categorie_id">Categorie du film</label>
        <select class="form-control" id="categorie_id" name="categorie_id">
            @foreach($categories as $categorie)
            <option value=" {{$categorie->id}} "> {{$categorie->nom}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection