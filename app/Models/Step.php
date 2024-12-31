<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Step extends Model
{
    use HasFactory, AsSource;

    protected $fillable = ['event_id', 'name', 'description', 'order', 'path'];

    /**
     * Получить событие, связанное с этим шагом.
     */
    public function event()
    {
        return $this->belongsTo( Event::class );
    }

    /**
     * Получить родительский шаг.
     */
    public function parent()
    {
        return $this->belongsTo( Step::class, 'parent_id' );
    }

    /**
     * Получить дочерние шаги.
     */
    public function children()
    {
        return $this->hasMany( Step::class, 'parent_id' );
    }

    /**
     * Добавить дочерний шаг.
     *
     * @param array $attributes Атрибуты нового шага
     * @return Step Новый шаг
     */
    public function addChild( array $attributes )
    {
        // Построить path, добавляя текущий ID к path родительского шага
        $newPath = $this->path ? $this->path . '.' . $this->id : (string) $this->id;

        // Объединить path и ID родителя с атрибутами
        $attributes = array_merge( $attributes, [
            'path' => $newPath,
            'parent_id' => $this->id,
        ] );

        // Создать и вернуть новый шаг
        return self::create( $attributes );
    }
}
