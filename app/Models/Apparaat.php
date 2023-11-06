<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apparaat extends Model
{
    use HasFactory;
    protected $table = 'apparaten';

    public function innames()
    {
        return $this->belongsToMany(Inname::class, 'innameapparaat', 'apparaat_id', 'inname_id');
    }

}
