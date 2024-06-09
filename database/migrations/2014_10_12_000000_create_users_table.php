<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->integer('list_of_trainees')->default(0);
            $table->integer('courses')->default(0);
            $table->integer('list_of_trainers')->default(0);
            $table->integer('examination')->default(0);
            $table->integer('child_admin')->default(0);
            $table->integer('is_viewer')->default(0);
            $table->integer('status')->default(1);
            $table->integer('is_child_admin')->default(1);
            $table->integer('learning_support')->default(0);
            $table->integer('reading_materials')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
