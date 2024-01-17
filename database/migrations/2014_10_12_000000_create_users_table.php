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
            $table->string('password');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('phone');
            $table->string('website');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('referral_code')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->double('balance')->nullable();
            $table->string('status')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->string('stripe_ID')->nullable();
            $table->string('paypal_email')->nullable();
            $table->rememberToken();
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
