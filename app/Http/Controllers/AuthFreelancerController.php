<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Carbon\Carbon;

// Models
use App\Models\User;
use App\Models\City;
use App\Models\Skills;

class AuthFreelancerController extends Controller
{
    public function showRegisterFreelancer()
    {
        $skills = Skills::all();
        $cities = City::all();

        return view('Auth.Register.RegisterFreelancer', compact('skills', 'cities'));
    }

    public function registerfreelancer(Request $request)
    {
        $date_min = Carbon::now()->subYears(18)->format('Y-m-d');

        $request->validate(
            [
                'birth_date' => [
                    'required',
                    'date',
                    'before_or_equal:' . $date_min
                ],
                'cpf' => [
                    'required',
                    'unique:users,cpf',
                    'unique:company,cnpj_cpf'
                ],
                'phone_number' => [
                    'required',
                    'unique:users,phone_number',
                    'unique:company,phone_number'
                ],
                'email' => [
                    'required',
                    'email',
                    'unique:users,email',
                    'unique:company,email'
                ],
            ],
            [
                'birth_date.before_or_equal' => 'Você deve ser maior de 18 anos para se cadastrar.',

                'cpf.number' => 'O campo CPF deve conter apenas números.',
                'cpf.max' => 'O campo CPF deve conter no máximo 14 caracteres.',
                'cpf.unique' => 'O CPF informado já está em uso.',

                'phone_number.number' => 'O campo telefone deve conter apenas números.',
                'phone_number.max' => 'O campo telefone deve conter no máximo 15 caracteres.',
                'phone_number.unique' => 'O número de telefone informado já está em uso.',

                'email.email' => 'O campo email deve conter um endereço de email válido.',
                'email.unique' => 'O endereço de email informado já está em uso.',
            ]
        );

        $user = User::create($request->all());

        if ($request->has('skills')) {
            $user->skills()->sync($request->skills);
        }

        // User::create([
        //     'complete_name' => $request->complete_name,
        //     'cpf' => $request->cpf,
        //     'birth_date' => $request->birth_date,
        //     'phone_number' => $request->phone_number,
        //     'email' => $request->email,
        //     'city_id' => $request->city_id,
        //     'address' => $request->address,
        //     'professional_title' => $request->professional_title,
        //     'portfolio_link' => $request->portfolio_link,
        //     'bio' => $request->bio,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('login');
    }
}
