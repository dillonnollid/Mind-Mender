<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('content');
            $table->text('excerpt')->nullable(); // Short summary of the blog
            $table->string('slug')->unique(); // A slug for SEO-friendly URLs
            $table->timestamps();

            // Add foreign key relationship to users table, field must already exist before we try to create a relation to another table e.g. Users
            //$table->foreign('user_id')->references('id')->on('users');//->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
