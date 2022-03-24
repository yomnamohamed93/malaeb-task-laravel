<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string("player_name");
            $table->string("player_phone");
            $table->date("booking_date");
            $table->time("start_time");
            $table->time("end_time");
            $table->integer("slot_duration");
            $table->foreignId('stadium_id')->constrained('stadiums')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pitch_id')->constrained('pitches')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
