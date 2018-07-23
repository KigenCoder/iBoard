<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('names');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('organization_id');
            $table->unsignedInteger('user_role_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('organization_id')
                ->references('id')
                ->on('organizations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('user_role_id')
                ->references('id')
                ->on('user_roles')
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
        Schema::dropIfExists('users');
    }
}
