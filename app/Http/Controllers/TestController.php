<?php

namespace App\Http\Controllers;

use App\Author;
use App\City;
use App\Country;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // Récupération des informations pour le formulaire
        $author = Author::with('cities.countries')->find($id);



//        dd($author);
        $countries = Country::all();

        // Envoi du formulaire
        return view('edit', compact('author', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation

        
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        // Mise à jour de l'auteur
        $author = Author::find($id);
        $author->name = $request->name;
        $author->city_id = $request->city;
        $author->save();

        // Redirection sur le formulaire
        return redirect(route('test.edit', $id))->with("success, L'auteur a bien été mis à jour !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cities($id)
    {
        // Retour des villes pour le pays sélectionné
        return City::whereCountryId($id)->get();
    }
}
