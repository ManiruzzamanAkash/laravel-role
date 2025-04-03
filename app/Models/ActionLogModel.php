<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionLogModel extends Model
{
    protected $fillable = [
        'type',
        'title',
        'action_by',
        'data',
    ];
}
