<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Conta extends Eloquent {

    use HasFactory;
    public $table = 'users';
    protected $fillable = ['user_name', 'user_email', 'user_pass'];
    protected $primaryKey = 'id';
    public $timestamps = false;

}