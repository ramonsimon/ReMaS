<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'rollen';



    public function medewerkers() {
        return $this->hasMany('App\Models\Medewerker');
    }

}
