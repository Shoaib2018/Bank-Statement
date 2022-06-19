<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Particulars extends Model
{
    use Notifiable;

    protected $table = 'particulars';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
