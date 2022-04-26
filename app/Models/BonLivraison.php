<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLivraison extends Model
{
    use HasFactory;
    protected $table = 'bon_livraisons';
    protected $primaryKey = 'bonlivraison_id';
    protected $fillable =[
        'reference_bl',
        'objet',
        'date_bl',
        'date_avoir',
        'statut',
        'tva_statut',
        'iddevis',
        'disponibilite',
        'condition_paiement',
        'garentie',
        'validite',
        'delai_liv',
        'lieu_liv',
        'iduser',
    ];
}