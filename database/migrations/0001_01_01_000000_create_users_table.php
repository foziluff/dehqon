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
            $table->string('surname');
            $table->string('phone')->unique();
            $table->date('born_in');
            $table->string('password')->nullable();
            $table->integer('gender');
            $table->string('currency');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('image_path', 2048)->nullable();
            $table->string('device')->nullable();

            $table->string('_token')->nullable();

            $table->integer('role')->nullable();

            $table->unsignedBigInteger('organization_id')->nullable();

            $table->timestamps();
        });

        Schema::create('phone_verify_codes', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->integer('code');
            $table->timestamps();
        });

        Schema::create('register_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('token');
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('phone')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('phone_verify_codes');
        Schema::dropIfExists('register_tokens');
    }
};
