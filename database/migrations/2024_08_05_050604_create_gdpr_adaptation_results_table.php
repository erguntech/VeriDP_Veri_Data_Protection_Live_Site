<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gdpr_adaptation_results', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id')->nullable();
            $table->text('question_answers')->nullable();
            $table->integer('result_points')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gdpr_adaptation_results');
    }
};
