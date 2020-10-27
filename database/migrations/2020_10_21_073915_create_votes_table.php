<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('no_urut');
            $table->string('nama');
            $table->string('panggilan');
            $table->bigInteger('total_suara')->default(0);
            $table->timestamps();
        });

        \DB::table('votes')->insert(
            [
                [
                    'no_urut' => '1',
                    'nama' => 'Lingga Aradhana Sahadewa',
                    'panggilan' => 'lingga',
                ],
                [
                    'no_urut' => '2',
                    'nama' => 'I Gede Arya Raditya P',
                    'panggilan' => 'gede',
                ],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
