<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use File;
class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document_title');
            $table->string('document_path');
            $table->unsignedInteger('document_type_id');
            $table->unsignedInteger('meeting_id');
            $table->timestamps();

            $table->foreign('document_type_id')
                ->references('id')
                ->on('document_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('meeting_id')
                ->references('id')
                ->on('meetings')
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
        Schema::dropIfExists('documents');
    }
}
