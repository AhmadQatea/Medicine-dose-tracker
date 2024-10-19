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
        Schema::table('users', function (Blueprint $table) {
            $table->string('country_code')->after('email'); // إضافة عمود country_code
            $table->string('phone_number')->after('country_code'); // إضافة عمود phone_number
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('country_code'); // حذف عمود country_code
            $table->dropColumn('phone_number'); // حذف عمود phone_number
        });
    }
};
