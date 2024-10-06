<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gdpr_adaptation_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_content')->nullable();
            $table->text('question_answer')->nullable();
            $table->text('question_vulnerabilities')->nullable();
            $table->text('question_suggestions')->nullable();
            $table->float('question_score')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gdpr_adaptation_questions');
    }
};
