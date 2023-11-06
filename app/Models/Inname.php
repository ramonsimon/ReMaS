<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inname extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
    protected $dates = ['tijdstip'];


    public function apparaten()
    {
        return $this->belongsToMany(Apparaat::class, 'innameapparaat', 'inname_id', 'apparaat_id');
    }





}
