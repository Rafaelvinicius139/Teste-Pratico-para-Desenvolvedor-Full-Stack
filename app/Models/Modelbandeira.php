<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelGrupo;

class ModelBandeira extends Model
{
    use HasFactory;

     protected $table = 'bandeiras'; 

    protected $fillable = ['nome', 'grupo_economico_id'];

    public function grupo()
    {
        return $this->belongsTo(ModelGrupo::class, 'grupo_economico_id');
    }
}