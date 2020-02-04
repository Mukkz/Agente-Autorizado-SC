<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preventiva extends Model
{
    
    protected $fillable = [
        'cliente', 'instancia', 'cluster', 'cidade','reclamacao', 'user_id', 'status','resolucao', 'tipificacao', 'encerramento', 'criado_por', 'tecnologia'
    ];


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
