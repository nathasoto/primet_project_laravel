<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $filiable = [
        'message'
    ];
    public function users(){
        return $this ->hasMany(User::class);
    }
}
