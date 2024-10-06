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
        Schema::create('inventory_data_sets', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->integer('department_id')->nullable(); // Departman Adı
            $table->string('data_title')->nullable(); // Faaliyet Adı
            $table->integer('inventory_category_id')->nullable(); // Veri Kategorisi
            $table->integer('inventory_data_type_id')->nullable(); // Kişisel Veri Türü
            $table->string('data_hold_reason_ids')->nullable(); // Saklama Sebepleri IDS
            $table->integer('related_to_id')->nullable(); // İlgili Kişi (Veri Sahibi)
            $table->text('legal_reason')->nullable(); // Hukuki Sebep
            $table->string('data_hold_place')->nullable(); // Saklama Yeri
            $table->string('data_hold_time')->nullable(); // Saklama Süresi
            $table->integer('data_transfer_to_id')->nullable(); // Alıcı / Alıcı Grupları
            $table->boolean('data_to_abroad')->default(false); // Yurtdışına Aktarım
            $table->string('kvkk_precaution_ids')->nullable(); // Tedbirler
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
        Schema::dropIfExists('inventory_data_sets');
    }
};
