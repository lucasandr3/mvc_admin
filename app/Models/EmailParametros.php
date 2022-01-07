<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class EmailParametros extends Eloquent {

    use HasFactory;
    public $table = 'parametros_email';
    protected $fillable = ['email_host', 'email_user', 'email_pass', 'email_secure', 'email_port', 'email_from' ,'email_name'];
    protected $primaryKey = 'id';
    public $timestamps = false;

}