<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CountryCode;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // تحقق من وجود رمز الدولة في قاعدة البيانات
        $countryCode = CountryCode::where('code', $data['country_code'])->first();

        if (!$countryCode) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'country_code' => ['required', 'string', 'regex:/^\+\d{1,3}$/'], // تحقق من أن الرمز يبدأ بـ "+" ويتبعه 1-3 أرقام
                'phone' => ['required', 'string', 'size:' . $countryCode->phone_length], // تحقق من عدد خانات الرقم
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ])->after(function ($validator) {
                $validator->errors()->add('country_code', 'رمز الدولة غير موجود.');
            });
        }

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country_code' => ['required', 'string', 'regex:/^\+\d{1,3}$/'], // تحقق من أن الرمز يبدأ بـ "+" ويتبعه 1-3 أرقام
            'phone' => [
                'required',
                'string',
                'size:' . $countryCode->phone_length, // تحقق من عدد خانات الرقم
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'country_code' => $data['country_code'], // تأكد من إضافة country_code
            'phone_number' => $data['phone'], // تأكد من إضافة phone_number
        ]);
    }

    // إضافة الدالة getPhoneLength هنا
    protected function getPhoneLength($countryCode)
    {
        $country = CountryCode::where('code', $countryCode)->first();
        return $country ? $country->phone_length : null; // إرجاع طول الرقم أو null إذا لم يكن موجودًا
    }
}
