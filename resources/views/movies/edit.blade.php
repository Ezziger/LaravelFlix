@extends('layout')

@section('content')
<form action=" {{route('film.update', $film->id)}} " method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $film->nom }}">
    </div>
    <div class="form-group">
        <label for="description">Description du film</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $film->description }}">
    </div>
    <div class="form-group">
        <label for="année_de_sortie">Année de sortie</label>
        <input type="number" class="form-control" id="année_de_sortie" name="année_de_sortie" value="{{ $film->année_de_sortie }}">
    </div>
    <div class="form-group">
        <label for="duree">Durée du film (en minutes)</label>
        <input type="number" class="form-control" id="duree" name="duree" value="{{ $film->duree }}">
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
        <input type="file" class="form-control" name="image" value=" {{ $film->image }}">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>
@endsection