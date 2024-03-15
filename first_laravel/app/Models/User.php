<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_name',
        'password'
    ];
    public function messages(){
        return $this ->belongsToMany(Message::class);
    }
}
