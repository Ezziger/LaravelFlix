<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::join('categories', 'films.categorie_id', '=', 'categories.id')
                      ->select('films.id','films.nom', 'films.description','films.année_de_sortie','films.duree','films.image', 'categories.nom as titre')
                      ->get();
        return view('movies.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('movies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) {
        $imageName = "";
        if($req->image) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('images'), $imageName);
        }
        $newFilm = new Film;
        $newFilm-> nom = $req->nom;
        $newFilm-> description = $req->description;
        $newFilm-> année_de_sortie = $req->année_de_sortie;
        $newFilm-> duree = $req->duree;
        $newFilm-> categorie_id = $req->categorie_id;
        $newFilm-> image = '/images/' . $imageName;
        $newFilm->save();
        return back()
            ->with('success', 'Votre image a été sauvegardée avec succès !' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::findOrFail($id);
        $categories = Categorie::all();
        return view('movies/edit', compact('film', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $updateFicheFilm = $req->validate([
            'nom' => 'required',
            'description' => 'required',
            'année_de_sortie' => 'required',
            'duree' => 'required',
            'categorie_id' => 'required',
            'image' => 'required'
        ]);
        $updateFicheFilm = $req->except(['_token', '_method']);

        if($req->image) {
            $imageName = time() . '.' . $req->image->extension();
            $req->image->move(public_path('images'), $imageName);
            $updateFicheFilm['image'] = "/images/" . $imageName;
        }

        Film::whereId($id)->update($updateFicheFilm);
        return redirect()->route('film.index')
                         ->with('success', 'La fiche film a été mise à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('film.index')
                         ->with('success', 'La fiche personnage a été mise supprimée avec succès !');
    }
}
