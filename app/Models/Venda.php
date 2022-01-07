<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Venda extends Eloquent
{

    use HasFactory;

    public $table = 'venda';
    public $timestamps = false;
    protected $fillable = ['vendedor', 'parceiro', 'cliente', 'subtotal', 'total', 'desconto', 'data_venda'];
    protected $primaryKey = 'id_venda';

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function produtos()
    {
        return $this->hasMany(VendaProduto::class);
    }

}