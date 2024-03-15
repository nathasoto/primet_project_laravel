<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Message extends Model
{
    use HasFactory;
    use HasUuids;
    
    protected $fillable = [
        'message', 'users_id' // Asegúrate de incluir user_id en los fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
