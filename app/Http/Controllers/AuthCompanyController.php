<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\AreaDeAtuacao;

class AuthCompanyController extends Controller
{
    /**
     * Mostrar o formulário de registro
     */
    public function showToRegisterCompany()
    {
        $areaAtuacoes = AreaDeAtuacao::all();
        return view('Auth.Register.RegisterCompany',compact("AreaAtuacoes"));
    }
    
    /**
     * Processar o cadastro da empresa
     */
    public function registerCompany(Request $request)
    {
        // Validar os dados
        $request->validate([
            'razao_social' => 'required|string|max:255',
            'documento' => 'required|string|max:18',
            'area_atuacao_id' => 'required|string',
            'password' => 'required|string|min:6',
            'descricao' => 'required|string|min:20|max:1000',
            'nome_responsavel' => 'required|string|max:255',
            'email' => 'required|email|unique:empresas,email',
            'telefone' => 'required|string|max:20',
            'cidade' => 'required|string|max:100',
            'endereco' => 'required|string|max:500',
            'termos' => 'required'
        ]);
        
        // Verificar se o documento é CNPJ ou CPF
        $documentoLimpo = preg_replace('/[^0-9]/', '', $request->documento);
        
        // Cadastrar no banco
        $empresa = Empresa::create([
            'social_name' => $request->razao_social,
            'cnpj_cpf' => $documentoLimpo,
            'area_atuacao_id' => $request->area_atuacao_id,
            'password' => Hash::make($request->password),
            'descricao' => $request->descricao,
            'nome_responsavel' => $request->nome_responsavel,
            'email' => $request->email,
            'telefone' => preg_replace('/[^0-9]/', '', $request->telefone),
            'cidade' => $request->cidade,
            'endereco' => $request->endereco,
            'status' => 'pendente'
        ]);
        
        // Redirecionar com sucesso
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça login.');
    }
}