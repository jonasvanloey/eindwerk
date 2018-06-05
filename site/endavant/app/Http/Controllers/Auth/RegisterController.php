<?php

namespace App\Http\Controllers\Auth;

use App\company;
use App\Role;
use App\student;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Spatie\Geocoder\Facades\Geocoder;

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $adress = $data['adress'].' '.$data['zip_code'].' '.$data['city'];
        $afterGeo=Geocoder::getCoordinatesForAddress($adress);
        $user = new User();
        $user->name = $data['name'];
        $user->familyname = $data['familyname'];
        $user->phone_number = $data['phone_number'];
        $user->date_of_birth = $data['date_of_birth'];
        $user->national_register = $data['national_register'];
        $user->email = $data['email'];
        $user->adress = $data['adress'];
        $user->city = $data['city'];
        $user->zip_code = $data['zip_code'];
        $user->password = Hash::make($data['password']);
        $user->latitude = $afterGeo['lat'];
        $user->longtitude = $afterGeo['lng'];
        $user->save();
        if ($data['company']['name'] === null) {
            $user->roles()->attach(Role::where('name', 'student')->first());
            $stud = new student();
            $stud->description = null;
            $stud->user_id = $user->id;
            $stud->save();
        } else {
            $adress2 = $data['company']['adress'].' '.$data['company']['zip_code'].' '.$data['company']['city'];
            $afterGeo2=Geocoder::getCoordinatesForAddress($adress2);
            $user->roles()->attach(Role::where('name', 'company')->first());
            $bus = new company();
            $bus->name=$data['company']['name'];
            $bus->vat_number=$data['company']['vat_number'];
            $bus->adress=$data['company']['adress'];
            $bus->phone_number=$data['company']['phone_number'];
            $bus->description=$data['description'];
            $bus->city=$data['company']['city'];
            $bus->zip_code=$data['company']['zip_code'];
            $bus->latitude = $afterGeo2['lat'];
            $bus->longtitude = $afterGeo2['lng'];
            $bus->save();
            $bus->users()->attach($user->id);


        }


        return $user;
    }
}
