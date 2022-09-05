<?php

namespace App\Http\Controllers;

use App\Models\Bt;
use App\Models\Di;
use App\Models\Equipements;
use App\Models\Personnels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\BaseTag;

class BtController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $di = Di::orderBy('created_at','desc')->get();
        $data = Bt::orderBy('created_at','desc')->get();
        $user = User::all();
        $personnels = Personnels::all();
        $equipements = Equipements::all();
        return view('bt.index',compact('data','equipements','personnels','user','di'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create(Request $request)
    {
        $di = Di::orderBy('created_at','desc')->get();
        $personnels = Personnels::all();
        $equipements = Equipements::all();
        return view('bt.add',compact('di','equipements','personnels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_souhaite' => ['required'],
            'observation' => ['required', 'min:3', 'string'],
            'idequipement' => ['required'],
            'priorite' => ['required'],
        ]);
        $iduser = Auth::user()->id;

        $lastNum = Bt::whereRaw('bt_id = (select max(`bt_id`) from bt)')->get();
        /** @var 'on' genere la  $reference */

        if (count($lastNum)>0) {
            $num = $lastNum[0]->bt_id + 1;
            $actual = str_pad($num, 5, "0", STR_PAD_LEFT);
        }else{
            $num = 0;
            $actual = str_pad($num, 5, "0", STR_PAD_LEFT);
        }
        $dataId = $request->bt_id;
        $save = Di::updateOrCreate(
            ['di_id' => $dataId],
            [
                'num_di' => $actual,
                'code_sympt' => $request->code_sympt,
                'valeur_compteur' => $request->valeur_compteur,
                'localisation' => $request->localisation,
                'priorite' => $request->priorite,
                'date_souhaite' => $request->date_souhaite,
                'observation' => $request->observation,
                'etat_organe' => $request->etat_organe,
                'etat_equipement' => $request->etat_equipement,
                'idequipement' => $request->idequipement,
                'organe' => $request->organe,
                'emet' => $request->emet,
                'dest' => $request->dest,
                'iduser' => $iduser,
            ]);
        if ($save) {
            return redirect()->route('bt.index')->with('success', 'Enregistré avec succès!');

        }
        return redirect()->back()->with('danger', "Désolé une erreur s'est produite. Veillez recommencer!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipements  $equipements
     * @return \Illuminate\Http\Response
     */
    public function show(Equipements $equipements)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipements  $equipements
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipements $equipements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipements  $equipements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipements $equipements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipements  $equipements
     *
     */
    public function destroy(Equipements $equipements)
    {
        $equipements->delete();

        return redirect()->route('equipement.index')
            ->with('success','Product deleted successfully');
//        $delete = Equipements::where('equipement_id',$equipements->id)->delete();
//        return Response()->json($delete);
    }

    public function delete(Request $request)
    {
        $delete = Bt::where('bt_id',$request->id)->delete();
        return Response()->json($delete);
    }
}
