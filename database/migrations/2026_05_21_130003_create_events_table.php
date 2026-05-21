<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();
            $table->foreignId('category_id')
                  ->constrained('event_categories')
                  ->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('location');
            $table->string('google_map')->nullable();
            $table->date('event_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('short_description')
                  ->nullable();
            $table->longText('description');
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->integer('max_participants')
                  ->default(100);
            $table->integer('registered_count')
                  ->default(0);
            $table->decimal('ticket_price', 10, 2)
                  ->default(0);
            $table->enum('status', [
                'upcoming',
                'ongoing',
                'completed',
                'cancelled'
            ])->default('upcoming');
            $table->boolean('featured')
                  ->default(false);

            $table->timestamps();
            $table->softDeletes();

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};