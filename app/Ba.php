<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ba extends Model
{
    protected $fillable = [
        'cliente', 'documento', 'cluster', 'informacao', 'status','feedback', 'criado_por', 'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
