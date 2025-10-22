<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $primaryKey = 'uid';

    public $incrementing = false;

    protected $fillable = ['uid', 'userUid', 'action', 'function', 'data', 'ip'];

}
