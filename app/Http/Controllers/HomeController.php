<?php

namespace App\Http\Controllers;

use App\Models\Charges;
use App\Models\Clients;
use App\Models\Commandes;
use App\Models\Devis;
use App\Models\Factures;
use App\Models\Fournisseurs;
use App\Models\Produit_Factures;
use App\Models\Produits;
use App\Models\Taches;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       return view('dashboard');
    }

    public function text()
    {
        return redirect(route('home'))->with('warning','Un bon test reuissi toujours!');
    }

}
