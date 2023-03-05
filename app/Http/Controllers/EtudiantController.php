<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index()
    {
        return  Inertia::render('EtudiantIndex');
    }

    public function create()
    {
        return Inertia::render('EtudiantCreate');
    }
}
