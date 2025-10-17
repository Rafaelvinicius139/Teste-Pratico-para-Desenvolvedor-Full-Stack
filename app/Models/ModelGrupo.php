<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGrupo extends Model
{
    use HasFactory;

     protected $table = 'grupos_economicos'; 

     protected $fillable = ['nome'];
}