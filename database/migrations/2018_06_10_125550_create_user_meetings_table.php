<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('meeting_id');
            $table->unsignedInteger('user_role_id');
            $table->unsignedInteger('did_attend')->nullable()->default(0);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('meeting_id')
                ->references('id')
                ->on('meetings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_role_id')
                ->references('id')
                ->on('meeting_roles')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_meetings');
    }
}
