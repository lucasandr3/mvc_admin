<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CarrinhoAbandonado extends Eloquent {

    use HasFactory;
    public $table = 'cart_abandoned';
    public $timestamps = false;

}