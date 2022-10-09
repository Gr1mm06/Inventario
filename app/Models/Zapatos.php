<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zapatos extends Model
{
    use HasFactory;

    protected $table = 'zapatos';
    public $timestamps = false;
    protected $fillable = [
        'id_modelo',
        'id_marca',
        'foto',
        'cantidad',
        'numero',
        'precio',
    ];
}
