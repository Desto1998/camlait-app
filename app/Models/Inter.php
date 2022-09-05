<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inter extends Model
{
    use HasFactory;
    protected $primaryKey = 'inter_id';
    protected $table = 'inter';
    protected $fillable = [
        'code',
        'etat',
        'centre',
        'classe',
        'organe',
        'date',
        'heure_debut',
        'heure_fin',
        'correction',
        'gamme_n',
        'intervenant_1',
        'intervenant_2',
        'intervenant_3',
        'staut',
        'iduser',
        'dest',
        'emet',
    ];
}
