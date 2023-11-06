<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InnameApparaat extends Model
{
    use HasFactory;
    protected $table = 'innameapparaat';

    protected $guarded = [];

    public function innames()
    {
        return $this->belongsToMany(Inname::class, 'inname_apparaat', 'apparaat_id', 'inname_id');
    }



}
