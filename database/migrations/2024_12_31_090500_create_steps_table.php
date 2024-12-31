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
        Schema::create( 'steps', function ( Blueprint $table ) {
            $table->id();
            $table->unsignedBigInteger( 'event_id' );
            $table->string( 'path' )->index();
            $table->string( 'name' );
            $table->text( 'description' )->nullable();
            $table->integer( 'order' )->default( 0 );
            $table->timestamps();

            $table->foreign( 'event_id' )->references( 'id' )->on( 'events' )->onDelete( 'cascade' );
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists( 'steps' );
    }
};