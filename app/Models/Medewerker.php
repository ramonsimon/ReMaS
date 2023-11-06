<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Medewerker extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
