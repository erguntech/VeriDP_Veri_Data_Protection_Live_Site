<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gdpr_decrees', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->date('date')->nullable();
            $table->string('decree_no')->nullable();
            $table->string('content')->nullable();
            $table->integer('sector_id')->nullable();
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
        Schema::dropIfExists('gdpr_decrees');
    }
};
