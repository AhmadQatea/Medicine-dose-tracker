<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('country_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // رمز الدولة
            $table->string('name'); // اسم الدولة
            $table->integer('phone_length'); // عدد خانات رقم الهاتف
            $table->timestamps();
        });

        // إضافة بيانات رموز الدول
        DB::table('country_codes')->insert([
            ['code' => '+963', 'name' => 'سوريا', 'phone_length' => 9],
            ['code' => '+1', 'name' => 'الولايات المتحدة', 'phone_length' => 10],
            ['code' => '+44', 'name' => 'المملكة المتحدة', 'phone_length' => 10],
            ['code' => '+20', 'name' => 'مصر', 'phone_length' => 10],
            ['code' => '+971', 'name' => 'الإمارات', 'phone_length' => 9],
            ['code' => '+966', 'name' => 'السعودية', 'phone_length' => 9],
            ['code' => '+49', 'name' => 'ألمانيا', 'phone_length' => 10],
            ['code' => '+33', 'name' => 'فرنسا', 'phone_length' => 10],
            ['code' => '+39', 'name' => 'إيطاليا', 'phone_length' => 10],
            ['code' => '+34', 'name' => 'إسبانيا', 'phone_length' => 9],
            ['code' => '+81', 'name' => 'اليابان', 'phone_length' => 10],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_codes');
    }
};
