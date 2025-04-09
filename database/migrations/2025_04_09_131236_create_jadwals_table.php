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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id();
            $table->char('event_status', 1)->default('D');
            $table->date('event_begin');
            $table->date('event_end');
            $table->string('event_title', 60);
            $table->text('event_desc')->nullable(true);
            $table->text('event_location')->nullable(true);
            $table->char('event_link_location', 1)->default('F');
            $table->char('event_all_day', 1)->default('F');
            $table->time('event_time')->default(NULL);
            $table->time('event_end_time')->default(NULL);
            $table->char('event_recur', 1)->nullable(true)->default(NULL);
            $table->tinyInteger('event_recur_multiplier')->nullable(true)->default(1);
            $table->smallInteger('event_repeats')->nullable(true)->default(NULL);
            $table->char('event_hide_events', 1)->default('F');
            $table->char('event_show_title')->default('F');
            $table->unsignedBigInteger('event_author')->nullable(true)->default(NULL);
            $table->unsignedBigInteger('event_category')->default(1);
            $table->text('event_link')->nullable(true)->default(NULL);
            $table->unsignedBigInteger('event_image')->nullable(true)->default(NULL);
            $table->foreign('event_category')->references('id')->on('kategori')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
