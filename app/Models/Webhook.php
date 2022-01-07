<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Webhook extends Eloquent {

    use HasFactory;
    public $table = 'link_webhook';
    public $timestamps = false;

}