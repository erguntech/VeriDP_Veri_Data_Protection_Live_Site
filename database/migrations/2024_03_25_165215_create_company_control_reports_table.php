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
        Schema::create('company_control_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->string('report_name')->nullable(); // xx ayı dendetim raporu otomnatik getir
            $table->text('report_description')->nullable();
            $table->string('document_path')->nullable();
            $table->string('date_period')->nullable();
            $table->json('report_data')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_control_reports');
    }
};
