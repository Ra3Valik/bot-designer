<?php

use App\Enums\EventType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up() : void
    {
        Schema::create( 'events', function ( Blueprint $table ) {
            $table->id();
            $table->foreignId( 'bot_id' )->constrained()->onDelete( 'cascade' );
            $table->string( 'name' );
            $table->enum( 'type', array_column( EventType::cases(), 'value' ) )->default( EventType::CLICK_TIME->value );
            $table->text( 'description' )->nullable();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down() : void
    {
        Schema::dropIfExists( 'events' );
    }
};
