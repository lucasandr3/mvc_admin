<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class PermissaoItem extends Eloquent
{

    use HasFactory;

    public $table = 'permissoes';
    public $timestamps = false;
    protected $primaryKey = 'id';
}