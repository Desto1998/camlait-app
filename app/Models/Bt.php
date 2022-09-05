<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bt extends Model
{
    use HasFactory;
    protected $primaryKey = 'bt_id';
    protected $table = 'bt';
    protected $fillable = [
        'num_bt',
        'rubrique',
        'gamme',
        'projet',
        'classe',
        'iddi',
        'iduser',
        'intervenant_1',
        'intervenant_2',
        'intervenant_3',
        'observation',
    ];
}
