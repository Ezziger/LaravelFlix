@extends('layout')

@if(session()->get('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />
@endif

@section('content')
@foreach($films as $film)
<div class="card" style="width: 18rem;">
    <img src="{{ $film->image }}" class="card-img-top" alt="affiche de {{ $film->nom }}">
    <div class="card-body">
        <h5 class="card-title">{{ $film->nom }}</h5>
        <p class="card-text">{{ $film->description }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ $film->année_de_sortie }}</li>
        <li class="list-group-item">{{ $film->duree }}</li>
        <li class="list-group-item">{{ $film->titre }}</li>

    </ul>
    <div class="card-body">
        <a href=" {{ route('film.edit', $film->id) }}" class="card-link">Editer</a>
        <form action=" {{ route('film.destroy', $film->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary btn-sm" type="submit">Supprimer</button>
        </form>
    </div>
</div>
@endforeach
@endsection