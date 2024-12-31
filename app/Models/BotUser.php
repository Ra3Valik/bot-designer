<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class BotUser extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['bot_id', 'name', 'email', 'external_id'];

    public function bot()
    {
        return $this->belongsTo( Bot::class );
    }
}
