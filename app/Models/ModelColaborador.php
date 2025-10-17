<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelUnidade;

class ModelColaborador extends Model
{
    use HasFactory;

     protected $table = 'colaboradores'; 

     protected $fillable = ['nome','email','cpf','unidade_id'];


      public function con()
    {
        return $this->belongsTo(ModelUnidade::class,'unidade_id');
    }
}

