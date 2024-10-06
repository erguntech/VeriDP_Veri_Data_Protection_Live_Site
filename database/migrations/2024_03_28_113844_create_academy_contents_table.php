<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('academy_contents', function (Blueprint $table) {
            $table->id();
            $table->string('academy_content_name')->nullable();
            $table->string('academy_content_description')->nullable();
            $table->string('document_path')->nullable();
            $table->string('document_url')->nullable();
            $table->integer('academy_content_type')->nullable(); // 1-> Eğitim Dokümanları 2-> Eğitim Sunumları 3-> Eğitim Videoları
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
        Schema::dropIfExists('academy_contents');
    }
};
