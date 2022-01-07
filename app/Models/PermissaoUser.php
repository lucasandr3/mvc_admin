<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class PermissaoUser extends Eloquent
{

    use HasFactory;

    public $table = 'permissao_has_user';
    public $timestamps = false;
    protected $primaryKey = 'id';
}