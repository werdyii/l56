<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('invitations')) {
            Schema::create('invitations', function (Blueprint $table) {
                $table->char('token',32);
                $table->unsignedInteger('user_id')->nullable();
                $table->foreign('user_id', 'FK_invitations_users')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedInteger('game_id')->nullable();
                $table->foreign('game_id', 'FK_invitations_games')->references('id')->on('games')->onDelete('cascade');
                $table->datetime('sent_at')->nullable();
                $table->datetime('replpy_at')->nullable();
                $table->enum('replpy',['yes','no','maybe'])->nullable();
                $table->string('comment', 250)->nullable();
                $table->datetime('expire_at')->nullable();
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
        Schema::dropIfExists('invitations');
    }
}
