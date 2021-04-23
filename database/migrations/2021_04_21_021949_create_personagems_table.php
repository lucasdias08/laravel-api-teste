<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personagems', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();;
            $table->timestamps();
            $table->unsignedBigInteger("fk_aldeia_id");

            //fk
            $table->foreign("fk_aldeia_id")->references("id")->on("aldeias")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personagems');
    }
}
