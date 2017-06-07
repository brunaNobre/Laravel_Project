<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    protected $fillable = array('nome_cliente', 'email', 'telefone', 'proposta');

    public function carro() {
        return $this->belongsTo('App\Carro');
    }

    public function setPropostaAttribute($value) {
        $novo1 = str_replace('.', '', $value);
        $novo2 = str_replace(',', '.', $novo1);
        $this->attributes['proposta'] = $novo2;
    }
}
