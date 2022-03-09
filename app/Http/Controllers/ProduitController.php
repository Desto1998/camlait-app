<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comportes;
use App\Models\Pocedes;
use App\Models\Produit_Factures;
use App\Models\Produits;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    //function for product categories
    public function listCategories()
    {
        $data = Categories::join('users', 'users.id', 'categories.iduser')->get();
        return view('produit.categorie', compact('data'));
    }

    //create new categorie or update if id is provided
    public function storeCategorie(Request $request)
    {
        $request->validate([
            'code_cat' => ['required', 'min:3', 'string'],
            'titre_cat' => ['required', 'min:3', 'string'],
        ]);
        $iduser = Auth::user()->id;
        $dataId = $request->categorie_id;
        $checkCode = Categories::where('code_cat', $request->code_cat)->get();
        if (count($checkCode) > 0) {
            return redirect()->back()->with('warning', 'Une catégorie avec ce code existe déja!');
        }

        $save = Categories::updateOrCreate(
            ['categorie_id' => $dataId],
            [
                'titre_cat' => $request->titre_cat,
                'code_cat' => $request->code_cat,
                'description_cat' => $request->description_cat,
                'iduser' => $iduser,

            ]);
        if ($save) {
            return redirect()->back()->with('success', 'Enregistré avec succès!');

        }
        return redirect()->back()->with('danger', "Désolé une erreur s'est produite. Veillez recommencer!");
    }

    //delete categorie
    public function deleteCategore(Request $request)
    {
//        Produits::where('idcategorie',$request->id)->delete();
        $delete = Categories::where('categorie_id', $request->id)->delete();
        return Response()->json($delete);
    }

    //function for pruducts
    public function listproduct(Request $request)
    {
        $saleDevis = Pocedes::all();
        $sateFacture = Produit_Factures::all();
        $data = Produits::join('categories', 'categories.categorie_id', 'produits.idcategorie')
            ->join('users', 'users.id', 'produits.iduser')
            ->orderBy('produits.created_at', 'desc')
            ->get();
        $categories = Categories::all();
        return view('produit.produit', compact('data', 'categories', 'saleDevis', 'sateFacture'));
    }

    //function create or update product
    public function storeProduct(Request $request)
    {

        $request->validate([
            'titre_produit' => ['required'],
            'idcategorie' => ['required'],
            'quantite_produit' => ['required'],
            'prix_produit' => ['required'],
        ]);
        if (count($request->idcategorie) != count($request->titre_produit) || count($request->quantite_produit) != count($request->prix_produit) || count($request->titre_produit) != count($request->prix_produit)) {
            return redirect()->back()->with('warning', 'Le formulaire a été mal rempli! Rassurez vous de remplir tous les titre, quntite, prix, et categories');
        }
        $iduser = Auth::user()->id;
        $dataId = $request->produit_id;
        $reference = '';
        for ($i = 0; $i < count($request->titre_produit); $i++) {
            $getcat = Categories::where('categorie_id', $request->idcategorie[$i])->get();
//            $generatecode = Produits::where('idcategorie', $request->idcategorie[$i])
//                ->whereRaw('produit_id = (select max(`produit_id`) from produits)')
//                ->get()
//            ;
            Categories::where('categorie_id', $request->idcategorie[$i])->update(['actualNum' => DB::raw('actualNum + 1'),]);
            $actual = $getcat[0]->actualNum;
            $actual += 1;
            $input = $getcat[0]->code_cat;
            $reference = str_pad($actual, 4, "0", STR_PAD_LEFT);
            $reference = $input . $reference;

            $description_produit = '';

            //test if ther is description for actual row
            if (isset($request->description_produit[$i])) {
                $description_produit = $request->description_produit[$i];
            }
            $save = Produits::updateOrCreate(
                ['produit_id' => $dataId],
                [
                    'titre_produit' => $request->titre_produit[$i],
                    'idcategorie' => $request->idcategorie[$i],
                    'reference' => $reference,
                    'quantite_produit' => $request->quantite_produit[$i],
                    'prix_produit' => $request->prix_produit[$i],
                    'description_produit' => $description_produit,
                    'iduser' => $iduser,

                ])
            ;
        }


        if ($save) {
            return redirect()->back()->with('success', 'Enregistré avec succès!');

        }
        return redirect()->back()->with('danger', "Désolé une erreur s'est produite. Veillez recommencer!");
    }

//    update product
    public function updateProduct(Request $request)
    {
        $request->validate([
            'titre_produit' => ['required', 'min:3', 'string'],
            'idcategorie' => ['required'],
            'quantite_produit' => ['required'],
            'prix_produit' => ['required'],
        ]);
        $iduser = Auth::user()->id;
        $dataId = $request->produit_id;
        $reference = $request->reference;
        $save = Produits::updateOrCreate(
            ['produit_id' => $dataId],
            [
                'titre_produit' => $request->titre_produit,
                'idcategorie' => $request->idcategorie,
                'reference' => $reference,
                'quantite_produit' => $request->quantite_produit,
                'prix_produit' => $request->prix_produit,
                'description_produit' => $request->description_produit,
                'iduser' => $iduser,

            ]);

        if ($save) {
            return redirect()->back()->with('success', 'Enregistré avec succès!');

        }
        return redirect()->back()->with('danger', "Désolé une erreur s'est produite. Veillez recommencer!");
    }

    //delete product
    public function deleteProduct(Request $request)
    {
        $delete = Produits::where('produit_id', $request->id)->delete();
        return Response()->json($delete);
    }
}