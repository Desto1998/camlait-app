<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Di extends Model
{
    use HasFactory;

    protected $primaryKey = 'di_id';
    protected $table = 'di';
    protected $fillable = [
        'num_di',
        'code_sympt',
        'valeur_compteur',
        'localisation',
        'priorite',
        'date_souhaite',
        'date_accepte',
        'heure_di',
        'observation',
        'iduser',
        'dest',
        'emet',
        'organe',
        'etat_organe',
        'etat_equipement',
        'idequipement',
    ];
}
