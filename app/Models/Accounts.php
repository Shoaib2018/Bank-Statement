<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use Notifiable;

    protected $table = 'accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
