<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservatie extends Model
{
    use HasFactory;
    //beschermen tegen mass assignment
    protected $fillable = [
        'datum',
        'tijdslot',
        'voornaam',
        'familienaam',
        'abonnementsnummer'
    ];
}
