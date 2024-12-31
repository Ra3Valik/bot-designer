<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Event extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['bot_id', 'name', 'type', 'description'];

    public function bot()
    {
        return $this->belongsTo( Bot::class );
    }

    public function steps()
    {
        return $this->hasMany( Step::class )->orderBy( 'order' );
    }
}
