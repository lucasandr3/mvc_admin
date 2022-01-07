<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Plano extends Eloquent {

    use HasFactory;
    public $table = 'choose_plan';
    public $timestamps = false;
}