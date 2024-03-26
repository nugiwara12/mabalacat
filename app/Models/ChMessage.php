<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Chatify\Traits\UUID;

class ChMessage extends Model
{
    use UUID;
    use Notifiable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
