<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CancelaAssinatura extends Eloquent {

    use HasFactory;
    public $table = 'cancelamento_assinatura';
//    protected $fillable = ['user_name', 'user_email', 'user_pass'];
//    protected $primaryKey = 'id';
    public $timestamps = false;

}