<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Statements extends Model
{
    use Notifiable;

    protected $table = 'statements';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
