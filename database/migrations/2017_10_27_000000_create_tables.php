<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Osetrovatels', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('rodneCislo');
            $table->string('jmeno', 20);
            $table->string('prijmeni', 20);
            $table->string('vzdelani', 20)->nullable();
            $table->string('titul', 10)->nullable();

            $table->unique(["rodneCislo"], 'rodneCislo_UNIQUE');
        });

        Schema::create('TypVybehu', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nazev', 20);
        });

        Schema::create('Vybehs', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('potrebnyCas')->nullable();
            $table->string('pomucky', 30)->nullable();
            $table->integer('maxKapacita')->nullable();
            $table->integer('pocetPotrebnychOsetrovatelu')->nullable();
            $table->integer('idTypuVybehu')->unsigned();

            $table->foreign('idTypuVybehu')->references('id')->on('TypVybehu')->onDelete('cascade');
        });

        Schema::create('DruhZvirete', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nazev', 20);
        });

        Schema::create('Cisteni', function (Blueprint $table) {
            $table->integer('id')->unsigned(); // TODO nema to byt taky primární klíč?
            $table->integer('idOsetrovatele')->unsigned();
            $table->integer('idVybehu')->unsigned();
            $table->timestamp('casCisteni');

            $table->primary(['idOsetrovatele', 'idVybehu']);
            $table->foreign('idOsetrovatele')->references('id')->on('Osetrovatel')->onDelete('cascade');
            $table->foreign('idVybehu')->references('id')->on('Vybeh')->onDelete('cascade');
        });

        Schema::create('Zvires', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('zemePuvodu', 20)->nullable();
            $table->string('oblastVyskytu', 20);
            $table->string('rodici', 30)->nullable();
            $table->date('datumNarozeni');
            $table->date('datumUmrti')->nullable();
            $table->integer('idDruhu')->unsigned();
            $table->integer('idVybehu')->unsigned();
            $table->integer('casKrmeni');
            $table->integer('mnozstviZradla');
            $table->integer('idOsetrovatele')->unsigned();

            $table->foreign('idDruhu')->references('id')->on('DruhZvirete')->onDelete('cascade');
            $table->foreign('idVybehu')->references('id')->on('Vybeh')->onDelete('cascade');
            $table->foreign('idOsetrovatele')->references('id')->on('Osetrovatel')->onDelete('cascade');
        });

        Schema::create('SkoleniNaZvire', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idDruhu')->unsigned();

            $table->foreign('idDruhu')->references('id')->on('DruhZvirete')->onDelete('cascade');
        });

        Schema::create('SkoleniNaVybeh', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('idVybehu')->unsigned();

            $table->foreign('idVybehu')->references('id')->on('Vybeh')->onDelete('cascade');
        });

        Schema::create('Skoleni', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->date('datumSkoleni');
            $table->integer('idSkoleniNaZvire')->nullable()->unsigned();
            $table->integer('idSkoleniNaVybeh')->nullable()->unsigned();

            $table->foreign('idSkoleniNaZvire')->references('id')->on('SkoleniNaZvire')->onDelete('cascade');
            $table->foreign('idSkoleniNaVybeh')->references('id')->on('SkoleniNaVybeh')->onDelete('cascade');
        });

        Schema::create('OsetrovalMaSkoleni', function (Blueprint $table) {
            $table->integer('idOsetrovatele')->unsigned();
            $table->integer('idSkoleni')->unsigned();
            $table->primary(['idOsetrovatele', 'idSkoleni']);

            $table->foreign('idOsetrovatele')->references('id')->on('Osetrovatel')->onDelete('cascade');
            $table->foreign('idSkoleni')->references('id')->on('Skoleni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Vybeh');
        Schema::dropIfExists('DruhZvirete');
        Schema::dropIfExists('Cisteni');
        Schema::dropIfExists('SkoleniNaZvire');
        Schema::dropIfExists('Zvire');
        Schema::dropIfExists('Skoleni');
        Schema::dropIfExists('SkoleniNaVybeh');
        Schema::dropIfExists('TypVybehu');
        Schema::dropIfExists('OsetrovalMaSkoleni');
        Schema::dropIfExists('Osetrovatel');
    }
}
