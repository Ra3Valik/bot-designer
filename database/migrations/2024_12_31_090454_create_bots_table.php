<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create( 'bots', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' )->unique();
            $table->text( 'description' )->nullable();
            // ДОБАВИТЬ
            // время последней перезагрузки
            // состояние ( Запущен, остановлен, в разработке )
            // ключ бота
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists( 'bots' );
    }
};
