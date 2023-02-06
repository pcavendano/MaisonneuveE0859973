<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtudiantController extends Controller
{
    const MAX_IMAGE_ID = 6796;
    const MIN_IMAGE_ID = 1;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all(); //récupérer tous les etudiants de la DB
        return view('etudiants.index', ['etudiants' => DB::table('etudiants')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email = $request->old('email');
        $phone = $request->old('phone');
        $phone = $request->old('date_de_naissance');
        $nom = $request->old('nom');
        $adresse = $request->old('adresse');
        $villeId = $request->old('villeId');
        $validated = $request->validate([
            'email' => 'required|unique:etudiants|max:255'
        ]);


        $imageId = null;
        if (null === $imageId) {
            $imageId = random_int(self::MIN_IMAGE_ID, self::MAX_IMAGE_ID);
        }

        $imageId = sprintf('https://faces-img.xcdn.link/image-lorem-face-%d.jpg', $imageId);

        $filename = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $filename);

        // save uploaded image filename here to your database

        $etudiant = new Etudiant;
        $etudiant->nom = $request->nom;
        $etudiant->adresse = $request->adresse;
        $etudiant->phone = $request->phone;
        if($filename != null){
            $etudiant->image = $filename;
        }else{
            $etudiant->image = $imageId;
        }

        $etudiant->email = $request->email;
        $etudiant->date_de_naissance = $request->date_de_naissance;
        $etudiant->villeId = $request->villeId;
        $etudiant->save();
        return back('/')->with('status', 'Blog Post Form Data Has Been inserted')
            ->with('email', 'Létudiant avec le courriel'.$etudiant->email.'existe déjà.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view('etudiants.show', [
            'etudiant' => $etudiant,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Etudiant $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant = new Etudiant;
        $etudiant->nom = $request->nom;
        $etudiant->adresse = $request->adresse;
        $etudiant->phone = $request->phone;
        $etudiant->email = $request->email;
        $etudiant->date_de_naissance = $request->date_de_naissance;
        $etudiant->villeId = $request->villeId;
        $etudiant->save();
        return redirect('/')->with('success', 'Blog Post Form Data Has Been deleted');
    }
}
