<?php

namespace App\Http\Controllers;

use App\Models\Di;
use App\Models\Equipements;
use App\Models\Personnels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        //
        $data = Di::orderBy('created_at','desc')->get();
        $user = User::all();
        $personnels = Personnels::all();
        $equipements = Equipements::all();
        return view('di.index',compact('data','equipements','personnels','user'));
//        return view('equipement.equipement',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create(Request $request)
    {
        $personnels = Personnels::all();
        $equipements = Equipements::all();
        return view('di.add', compact('personnels','equipements'));
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
//        $lastNum = Di::whereYear('created_at', date('Y'))
//            ->whereRaw('facture_id = (select max(`facture_id`) from factures)')
//            ->get();

        $lastNum = Di::whereRaw('di_id = (select max(`di_id`) from di)')->get();
        /** @var 'on' genere la  $reference */
//        $reference = 'F' . date('Y');
//        if (count($lastNum) > 0) {
//            $lastNum = $lastNum[0]->reference_fact;
//            $actual = 0;
//            for ($j = 0; $j < strlen($lastNum); $j++) {
//                if ($j > 4) {
//                    $actual .= $lastNum[$j];
//                }
//            }
//            $num = (int)$actual;
//            $num += 1;
//            $actual = str_pad($num, 3, "0", STR_PAD_LEFT);
//            $reference .= $actual;
//        } else {
//            $num = 1;
//            $actual = str_pad($num, 3, "0", STR_PAD_LEFT);
//            $reference .= $actual;
//        }
        if (count($lastNum)>0) {
            $num = $lastNum[0]->di_id + 1;
            $actual = str_pad($num, 5, "0", STR_PAD_LEFT);
        }else{
            $num = 0;
            $actual = str_pad($num, 5, "0", STR_PAD_LEFT);
        }
        $dataId = $request->di_id;
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
//        return Response()->json($save);
        if ($save) {
            return redirect()->route('di.index')->with('success', 'Enregistré avec succès!');

        }
        return redirect()->back()->with('danger', "Désolé une erreur s'est produite. Veillez recommencer!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipements  $equipements
     * @return
     */
    public function show($id)
    {
        $data = Di::find($id);
        $emet = Personnels::find($data->emet);
        $dest = Personnels::find($data->dest);
        $equipement = Equipements::find($data->idequipement);
        $user = User::find($data->dest);
        return view('di.show',compact('data','equipement','user','dest','emet'));
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
        $delete = Di::where('di_id',$request->id)->delete();
        return Response()->json($delete);
    }
    //
}
