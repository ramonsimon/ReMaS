<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onderdeel extends Model
{
    use HasFactory;

    protected $table = 'onderdelen';

    protected $guarded = [];
}
