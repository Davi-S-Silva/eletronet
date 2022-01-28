<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function DadosEmpresa(Request $request){

        $this->validate($request,[
            'Login'=>'required',
            'Senha'=> 'required'
        ],
        [
            'Login.required'=>'Login é obrigatorio!',
            'Senha.required'=>'Senha é obrigatoria!'
        ]);

        if($request['Login']=="DaviSantos" && $request['Senha']=='32843826'){
            session(['UsuarioLogado' => $request['Login']]);
            return redirect()->route('admin');
        }else{
            return redirect()->back()->with('danger','Login ou Senha Inválido!');
        }
    }
    public function addcontato(Request $request)
    {
        echo $request['NomeContatoEmpresa'],$request['NumeroContatoEmpresa'],$request['EmailContatoEmpresa'] ,' - inserido!';
        //$this->contatos($request['NomeContatoEmpresa'],$request['NumeroContatoEmpresa'],$request['EmailContatoEmpresa']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {//validar todos os campos
        $this->validate($request,[
            'NomeEmpresa'=>'required',
            'LogoEmpresa'=>'required',
            'SloganEmpresa'=>'required',
            'SobreEmpresa'=>'required',
            'LocalizacaoEmpresa'=>'required',
            'NomeContatoEmpresa'=>'required',
            'NumeroContatoEmpresa'=>'required',
            'EmailContatoEmpresa'=>'required',
            'AreaCoberturaEmpresa'=>'required'
        ]);
        return "<pre>". $request ." </pre>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
