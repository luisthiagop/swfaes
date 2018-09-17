<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Talhao;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests\FuncionariosRequest;
use Session;
use Illuminate\Support\Facades\Gate;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
        return view('funcionarios.index');
    }

    public function data_tables()
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }

         $funcionarios = Funcionario::select(['id_funcionarios', 'nome','cpf'])->get();

        return Datatables::of($funcionarios)

            ->addColumn('action', function ($funcionario) {
                return '<a href="'.Route('funcionarios.edit',[$funcionario->id_funcionarios]).'" class="btn btn-primary">Editar</a>'.'<a href="'.Route('funcionarios.show',[$funcionario->id_funcionarios]).'"><button type="button" class="btn btn-link">Ver</button></a>';
            }
        )->make(true);
    }

    //

    public function data_tables_talhoes($id)
    {
        $funcionario = Funcionario::find($id);
        $talhoes = Talhao::where([['id_adms_talhoes_adms_talhoes','=',$funcionario->id_funcionarios]])->select('*')->get();
         //dd($adms);
        return Datatables::of($talhoes)
        ->addColumn('action',function($talhao){
            return '<a href="'.Route('talhoes.show',[$talhao->id_talhoes]).'" >Ver</a>';
        })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionariosRequest $request)
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
        $funcionario = new Funcionario();
        $funcionario->nome = strtoupper($request->nome);
        $funcionario->cpf = $request->cpf;
        $funcionario->login = $request->login;
        $funcionario->email = strtolower($request->email);
        $funcionario->password = $request->acesso_sistema==""?bcrypt("fazendaescola"):bcrypt($request->password);
        $funcionario->acesso_sistema = $request->acesso_sistema=="on"?TRUE:FALSE;

        //$funcionario->store();


        if($funcionario->save()){
            Session::flash('alert-success', 'Funcionário adicionado com sucesso!');
            return redirect()->route('funcionarios.index');
        }else{
            Session::flash('alert-danger', 'Erro ao adicionar funcionário');
            return redirect()->route('funcionarios.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionarios  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
        $talhoes = Talhao::all();
        return view('funcionarios.show')->with(compact('funcionario','talhoes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }

        if(!$funcionario){
            Session::flash('alert-danger', 'Funcionário não existe!');
            return redirect()->route('funcionarios.index');
        }
        else{
            return view('funcionarios.edit')->with(compact('funcionario'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
        $funcionario->nome= strtoupper($request->nome);
        $funcionario->login= ($request->login);
        $funcionario->cpf= ($request->cpf);
        $funcionario->email= strtolower($request->email);
        $funcionario->acesso_sistema = $request->acesso_sistema=="on"?TRUE:FALSE;

        if($funcionario->update()){
            Session::flash('alert-success', 'Funcionário editado com sucesso!');
            return redirect()->route('funcionarios.index');
        }else{
            Session::flash('alert-danger', 'Erro ao editar funcionário');
            return redirect()->route('funcionarios.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionarios  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        if (Gate::denies('gerenciar-funcionarios')) {
            return abort(403);
        }
    }
}
