<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Charges;
use App\Models\Taches;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class GestionController extends Controller
{
    //Fontion pour les charges
    public function charge()
    {
        $charges = Charges::join('users','users.id','charges.iduser')->get();
        return view('gestion.charges', compact('charges'));
    }
    // Store or edit function
    protected function storeCharge(Request $request)
    {
        $request->validate([
            'titre' => ['required', 'string', 'min:3',],
        ]);
        $iduser = Auth::user()->id;
        $dataId = $request->charge_id;
        $save = Charges::updateOrCreate(
            ['charge_id' => $dataId],
            [
                'titre' => $request->titre,
                'description' => $request->description,
                'iduser' => $iduser,

            ])
        ;
        return redirect()->back()->with('success','Enregistré avec succès!');

    }
    protected function deleteCharge(Request $request){
        $delete = Charges::where('charge_id',$request->id)->delete();
        return Response()->json($delete);
    }

    // fontion pour les taches
    public function taches()
    {
        $taches = taches::join('charges','charges.charge_id','taches.idcharge')
            ->join('users','users.id','charges.iduser')
            ->get();
        $charges = Charges::all();
        return view('gestion.taches', compact('charges','taches'));
    }

    // Store or edit
    protected function storeTask(Request $request)
    {
        $request->validate([
            'raison' => ['required', 'string', 'min:3'],
            'date_debut' => ['required'],
            'idcharge' => ['required'],
            'prix' => ['required'],
            'nombre' => ['required'],
        ]);
        $iduser = Auth::user()->id;
        $dataId = $request->tache_id;
        $save = Taches::updateOrCreate(
            ['tache_id' => $dataId],
            [
                'raison' => $request->raison,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_debut,
                'date_ajout' => date('Y-m-d'),
                'iduser' => $iduser,
                'idcharge' => $request->idcharge,
                'prix' => $request->prix,
                'nombre' => $request->nombre,
                'staut' => 1,

            ])
        ;
        return redirect()->back()->with('success','Enregistré avec succès!');

    }
    protected function deleteTache(Request $request){
        $delete = Taches::where('tache_id',$request->id)->delete();
        return Response()->json($delete);
    }
}
