<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoteDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file_urls1');
            $table->string('file_urls2') ->nullable();
            $table->string('file_urls3') -> nullable();
            $table->string('user_id')->nullable();
            $table->string('NoteId');
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
        Schema::dropIfExists('note_data');
    }
}
