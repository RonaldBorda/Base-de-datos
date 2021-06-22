<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $fillable= ['fecha','hora','paisA','paisB','puntuacionA','puntuacionB','banderaA','banderaB'];
}
