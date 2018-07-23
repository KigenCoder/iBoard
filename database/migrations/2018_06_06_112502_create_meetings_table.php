<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meeting_title');
            $table->timestamp('start_time')->useCurrent();
            $table->timestamp('end_time')->useCurrent();
            $table->string('venue');
            $table->unsignedInteger('meeting_type_id');
            $table->timestamps();

            $table->foreign('meeting_type_id')
                ->references('id')
                ->on('meeting_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
