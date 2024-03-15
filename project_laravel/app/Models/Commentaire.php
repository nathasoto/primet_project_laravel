<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Commentaire extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $fillable = [
        'message'
    ];
    public function users(){
        return $this ->hasMany(Message::class);
    }
}
