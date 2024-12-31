<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Bot extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->hasMany( BotUser::class );
    }

    public function events()
    {
        return $this->hasMany( Event::class );
    }
}
