<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Permissao extends Eloquent
{

    use HasFactory;

    public $table = 'grupo_permissoes';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function permissoes()
    {
        return $this->hasMany(PermissaoItem::class);
    }
}