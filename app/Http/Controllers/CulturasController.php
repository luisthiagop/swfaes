<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\CulturasRequest;
use App\Cultura;
use App\Atividade;
use App\Talhao;
use Yajra\Datatables\Datatables;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Auth;

class CulturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data_tables()
    {


         $culturas = Cultura::select(['*'])->get();
        if(Auth::user()->can('gerenciar-culturas')){
            return Datatables::of($culturas)
                ->editColumn('id_talhoes_talhoes', function($cultura){
                    return $cultura->talhao['identificador'];
                })
                ->editColumn('tipo_safra', function($cultura){
                    return $cultura->tipo_safra=='V'?"verão":"inverno";
                })
                ->editColumn('data_inicio', function($cultura){
                    return date( 'd/m/Y' , strtotime($cultura->data_inicio));
                })
                ->editColumn('data_fim', function($cultura){
                    return $cultura->data_fim!=null?date( 'd/m/Y' , strtotime($cultura->data_fim)):"Ativo";
                })
                ->addColumn('action', function ($cultura) {
                    return '<a href="'.Route('culturas.show',[$cultura->id_culturas]).'" class="">ver</a><br><a href="'.Route('culturas.edit',[$cultura->id_culturas]).'" class="btn btn-primary">Editar</a>     <meta name="csrf-token" content="'.csrf_token().'">
 <button type="button" class="confirm-btn btn btn-danger" value="'.$cultura->id_culturas.'" onclick="(delete_btn(this))"><i class="fas fa-trash-alt"></i>deletar</button>
';
                })->make(true);
        }else{
            return Datatables::of($culturas)
                ->editColumn('id_talhoes_talhoes', function($cultura){
                    return $cultura->talhao['identificador'];
                })
                ->editColumn('tipo_safra', function($cultura){
                    return $cultura->tipo_safra=='V'?"verão":"inverno";
                })
                ->editColumn('data_inicio', function($cultura){
                    return date( 'd/m/Y' , strtotime($cultura->data_inicio));
                })
                ->editColumn('data_fim', function($cultura){
                    return $cultura->data_fim!=null?date( 'd/m/Y' , strtotime($cultura->data_fim)):"Ativo";
                })
                ->make(true);
        }
    }


    public function index()
    {


        return view('culturas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }
        //$culturas = Cultura::whereIsNull('data_fim');
        $talhoes = Talhao::all();
        return view('culturas.create')->with(compact('culturas','talhoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CulturasRequest $request)
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }

        $verifica = Cultura::where('id_talhoes_talhoes',$request->talhao)->first();
        if($verifica && $verifica->data_fim == null ){
            Session::flash('alert-danger', 'Erro ao cadastrar cultura, esse talhão já possui uma!');
            return redirect()->back();
        }

        $cultura = new Cultura();
        $cultura->data_inicio = $request->data_inicio;
        $cultura->descricao = mb_strtoupper($request->descricao);
        $cultura->tipo_safra= $request->tipo_safra;
        $cultura->id_talhoes_talhoes = $request->talhao;
        //dd($cultura);
        if($cultura->save()){
            Session::flash('alert-success', 'Nova cultura cadastrada com sucesso!');
            return redirect()->route('culturas.index');
        }else{
            Session::flash('alert-danger', 'Erro ao cadastrar cultura!');
            return redirect()->route('culturas.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cultura = Cultura::find($id);
        if(!$cultura){
            Session::flash('alert-danger', 'Cultura não existente!');
            return redirect()->route('culturas.index');
        }
        $atividades = Atividade::where('id_culturas_culturas',$id)->get();
        return view('culturas.show')->with(compact('cultura','atividades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }
        $cultura = Cultura::find($id);
        $talhoes = Talhao::all();

            return view('culturas.edit')->with(compact('cultura','talhoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CulturasRequest $request, $id)
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }

        $cultura = Cultura::find($id);

        if($cultura->data_fim == false)
        {
            $talhoes = Talhao::all();
            Session::flash('alert-danger','A cultura não pode ser editada antes de ser finalizada!');
            return view('culturas.edit')->with(compact('cultura', 'talhoes'));
        }else{
            $cultura = Cultura::find($id);
            $cultura->data_inicio = $request->data_inicio;
            $cultura->descricao = mb_strtoupper($request->descricao);
            $cultura->tipo_safra= $request->tipo_safra;
            $cultura->id_talhoes_talhoes = $request->talhao;
            if($cultura->save()){
                Session::flash('alert-success', 'cultura atualizada com sucesso!');
                return redirect()->route('culturas.index');
            }else{
                Session::flash('alert-danger', 'Erro ao atualizar cultura!');
                return redirect()->route('culturas.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }

        $cultura = Cultura::find($id);
        //dd(count($cultura->atividades));
        if(!count($cultura->atividades)){
            $cultura->delete();
            Session::flash('alert-success', 'sucesso ao deletar cultura!');
            return response('sucesso ao deletar cultura!', 200);
        }else{
            Session::flash('alert-danger', 'Erro ao deletar cultura pois já existem atividades relacionadas!');
            return response('Erro ao deletar cultura pois já existem atividades relacionadas!', 405);
        }
    }

    public function finalizar($id)
    {
        if (Gate::denies('gerenciar-culturas')) {
            return abort(403);
        }

        $cultura = Cultura::find($id);
        $cultura->data_fim = Carbon::now()->toDateString();

        if($cultura->data_inicio > $cultura->data_fim)
        {
            Session::flash('alert-danger', 'Cultura só pode ser finalizada com data de fim maior que de início');
            return redirect()->route('culturas.index');
        }else
        {
            if($cultura->update()){
                Session::flash('alert-success', 'Cultura finalizada com sucesso');
                return redirect()->route('culturas.index');
            }else{
                Session::flash('alert-danger', 'Erro ao finalizar cultura!');
                return redirect()->route('culturas.index');
            }
        }
    }
}
