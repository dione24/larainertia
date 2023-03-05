<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\NiveauScolaire;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class NiveauScolaireController extends Controller
{
    public function index()
    {
        $niveauScolaires = NiveauScolaire::orderBy('nom', 'ASC')->paginate(2);
        return Inertia::render('IndexNiveauScolaire', ['niveauScolaires' => $niveauScolaires]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required | unique:App\Models\NiveauScolaire',
        ]);
        NiveauScolaire::create([
            'nom' => $request->nom,
        ]);

        return redirect()->back();
    }

    public function edit(NiveauScolaire $niveauScolaire)
    {
        return response()->json(['niveauScolaire' => $niveauScolaire]);
    }
    public function update(Request $request, NiveauScolaire $niveauScolaire)
    {
        $request->validate([
            'nom' => 'required',
            Rule::unique((new NiveauScolaire)->getTable(), "nom")->ignore($niveauScolaire->id),
        ]);

        if ($niveauScolaire->nom != $request->nom) {
            $niveauScolaire->nom = $request->nom;
            $niveauScolaire->save();
        }
        return redirect()->back();
    }
}
