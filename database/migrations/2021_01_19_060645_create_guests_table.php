<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('datein')->nullable();
            $table->datetime('dateout')->nullable();
            $table->string('guestsid')->nullable();
            $table->string('name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('company')->nullable();
            $table->string('email')->nullable();
            $table->string('activity')->nullable();
            $table->string('noRack')->nullable();
            $table->string('noLoker')->nullable();
            $table->string('lokasi_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('durasi')->nullable();
            $table->char('foto')->nullable();
            $table->string('id_status')->nullable();
            $table->timestamps();
            // $table->increments('id');
            // $table->char('nama');
            // $table->char('dari');
            // $table->char('keperluan');
            // $table->text('keterangan')->nullable();
            // $table->char('foto');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
