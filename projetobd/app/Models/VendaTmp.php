<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class VendaTmp extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'nome_funcionario', 'total'];

    public function Cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
