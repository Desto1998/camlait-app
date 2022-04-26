<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avoirs extends Model
{
    use HasFactory;
    protected $primaryKey = 'avoir_id';
    protected $fillable =[
        'reference_avoir',
        'objet',
        'date_avoir',
        'statut',
        'tva_statut',
        'idfacture',
        'service',
        'direction',
        'mode_paiement',
        'condition_paiement',
        'delai_liv',
        'observation',
        'note',
        'lieu_liv',
        'iduser',
    ];
    public function montantHT($id){
        $pocedes = ProduitAvoir::where('idavoir', $id)->get();
        $montantHT = 0;

        foreach ($pocedes as $p) {

            $remise = ($p->prix * $p->quantite * $p->remise) / 100;
            $montant = ($p->quantite * $p->prix) - $remise;
            $montantHT += $montant;

        }
        return number_format($montantHT, 2, '.', '');
    }

    public function montantTotal($id){
        $data = $this::where('facture_id', $id)
            ->get()
        ;
        $pocedes = ProduitAvoir::where('idavoir', $id)->get();
        $montantTVA = 0;
        $montantTTC = 0;
        foreach ($pocedes as $p) {

            $remise = ($p->prix * $p->quantite * $p->remise) / 100;
            $montant = ($p->quantite * $p->prix) - $remise;
            $tva = ($montant * $p->tva) / 100;
            $montant = $tva + $montant;
//                        $montant += (($montant * 19.25)/100)+$montant;
            $montantTVA += $montant;

        }
        if ($data[0]->tva_statut == 1) {
            $montantTTC = (($montantTVA * 19.25) / 100) + $montantTVA;
        } else {
            $montantTTC = $montantTVA;
        }

        return number_format($montantTTC, 2, '.', '');
    }
}