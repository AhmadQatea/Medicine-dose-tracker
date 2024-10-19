<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CountryCode;

class CountryCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CountryCode::create(['code' => '+963', 'name' => 'سوريا', 'phone_length' => 9]);
        CountryCode::create(['code' => '+1', 'name' => 'الولايات المتحدة', 'phone_length' => 10]);
        CountryCode::create(['code' => '+44', 'name' => 'المملكة المتحدة', 'phone_length' => 10]);
        CountryCode::create(['code' => '+20', 'name' => 'مصر', 'phone_length' => 10]);
        CountryCode::create(['code' => '+971', 'name' => 'الإمارات', 'phone_length' => 9]);
        CountryCode::create(['code' => '+966', 'name' => 'السعودية', 'phone_length' => 9]);
        CountryCode::create(['code' => '+49', 'name' => 'ألمانيا', 'phone_length' => 10]);
        CountryCode::create(['code' => '+33', 'name' => 'فرنسا', 'phone_length' => 10]);
        CountryCode::create(['code' => '+39', 'name' => 'إيطاليا', 'phone_length' => 10]);
        CountryCode::create(['code' => '+34', 'name' => 'إسبانيا', 'phone_length' => 9]);
        CountryCode::create(['code' => '+81', 'name' => 'اليابان', 'phone_length' => 10]);
    }
}
