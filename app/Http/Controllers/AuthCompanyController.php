<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\areaActivity;
use App\Models\Company;

class AuthCompanyController extends Controller
{
    /**
     * Mostrar o formulário de registro
     */
    public function showToRegisterCompany()
    {
        $areaActivitys = areaActivity::all();
        $cities = City::all();
        return view('Auth.Register.RegisterCompany', compact('areaActivitys', 'cities'));
    }

    /**
     * Processar o cadastro da empresa
     */
    public function registerCompany(Request $request)
    {
        // Validar os dados
        $request->validate(
            [
                'cnpj_cpf' => [
                    'required',
                    'unique:users,cpf',
                    'unique:companies,cnpj_cpf'
                ],
                'phone_number' => [
                    'required',
                    'unique:users,phone_number',
                    'unique:companies,phone_number'
                ],
                'email' => [
                    'required',
                    'unique:users,email',
                    'unique:companies,email'
                ],
            ],
            [
                'cnpj_cpf.unique' => 'Já existe um usuario com este Cpf ou Cnpj',
                'phone_number.unique' => 'Já existe um usuario com este numero',
                'email.unique' => 'Já existe um usuario com este email',
            ]
        );

        // Cadastrar no banco
        // dd($request->all());
        $company = Company::create([
            'company_name' => $request->company_name,
            'description' => $request->description,
            'cnpj_cpf' => $request->cnpj_cpf,
            'area_operation' => $request->area_operation,
            'assessment' => $request->assessment,
            'representative_name' => $request->representative_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'city_id' => $request->city_id,
            'cep' => $request->cep,
            'address' => $request->address,
            'neighborhood' => $request->neighborhood,
            'number' => $request->number,
            'password' => Hash::make($request->password)
        ]);

        // Redirecionar com sucesso
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }
}
