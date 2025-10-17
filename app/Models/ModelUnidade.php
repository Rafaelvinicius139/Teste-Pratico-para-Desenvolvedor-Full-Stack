<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelBandeira;

class ModelUnidade extends Model
{
    use HasFactory;

     protected $table = 'unidades'; 

     protected $fillable = ['nome_fantasia','razao_social','cnpj','bandeira_id'];
    
     public function ban()
    {
        return $this->belongsTo(ModelBandeira::class,'bandeira_id');
    }
}
