<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('season_user')) {
            Schema::create('season_user', function (Blueprint $table) {
                $table->integer('season_id')->unsigned()->index();
                $table->foreign('season_id', 'FK_pivot_seasons_users')->references('id')->on('seasons')->onDelete('cascade');

                $table->integer('user_id')->unsigned()->index();
                $table->foreign('user_id', 'FK_pivot_users_seasons')->references('id')->on('users')->onDelete('cascade');

                $table->enum('team',['modry','biely'])->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('season_user');
    }
}
