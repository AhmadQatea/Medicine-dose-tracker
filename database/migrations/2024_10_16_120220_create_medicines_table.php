<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الدواء
            $table->integer('dosage_quantity'); // كمية الجرعة
            $table->string('dosage_unit'); // وحدة الجرعة (مثل ملغ، مل، إلخ)
            $table->integer('frequency_quantity'); // كمية التكرار
            $table->string('frequency_unit'); // وحدة التكرار (مثل يوميًا، أسبوعيًا، إلخ)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // إضافة عمود المف��اح الخارجي للمستخدم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
