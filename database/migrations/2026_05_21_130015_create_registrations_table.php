<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('event_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->string('phone')->nullable();
            $table->text('note')->nullable();
            $table->integer('quantity')
                  ->default(1);
            $table->decimal('total_price', 10, 2)
                  ->default(0);
            $table->enum('status', [
                'pending',
                'approved',
                'cancelled'
            ])->default('pending');

            $table->timestamps();

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};