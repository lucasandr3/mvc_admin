<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Pix extends Eloquent {

    use HasFactory;
    public $table = 'venda_pagamento';
    public $timestamps = false;
}