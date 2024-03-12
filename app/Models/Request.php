<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table = 'request';
    protected $guard = [];


    // get chat messages by request_id
    public function chat()
    {
        return $this->hasMany(Chat::class, 'request_id')->orderByDesc('id');
    }
}
