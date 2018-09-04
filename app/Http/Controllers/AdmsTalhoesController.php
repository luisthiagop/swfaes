<?php

namespace App\Http\Controllers;

use App\AdmTalhao;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Session;

class AdmsTalhoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function data_tables($funcionario)
    {
         $adms = AdmTalhao::where([['id_funcionarios_funcionarios','=',$funcionario]])->whereNull('data_fim')->select('id_talhoes_talhoes')->get();
         //dd($adms);
        return Datatables::of($adms)
        ->editColumn('id_talhoes_talhoes', function($adm){
            //dd($adm->talhao->identificador);
            return $adm->talhao['identificador'];
        })
        ->make(true);
    }

    public function index()
    {
        //
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
     * @param  \App\AdmsTalhoes  $admsTalhoes
     * @return \Illuminate\Http\Response
     */
    public function show(AdmTalhao $admsTalhoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdmsTalhoes  $admsTalhoes
     * @return \Illuminate\Http\Response
     */
    public function edit(AdmTalhao $admsTalhoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdmsTalhoes  $admsTalhoes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $funcionario)
    {
        //dd($funcionario);


        foreach ($request->talhoes as $key => $talhao) {
            $admsTalhoes = AdmTalhao::where(['id_funcionarios_funcionarios'=>$funcionario,'id_talhoes_talhoes'=>$talhao])->first();
            if(!$admsTalhoes){
                $new_adm_talhao = new AdmTalhao();
                $new_adm_talhao->id_funcionarios_funcionarios = $funcionario;
                $new_adm_talhao->id_talhoes_talhoes =$talhao;
                $new_adm_talhao->save();
            }else{
                if($admsTalhoes->data_fim != ""){
                    $new_adm_talhao = new AdmTalhao();
                    $new_adm_talhao->id_funcionarios_funcionarios = $funcionario;
                    $new_adm_talhao->id_talhoes_talhoes =$talhao;
                    $new_adm_talhao->save();
                }else{
                    continue;
                }
            }

        }
        Session::flash('alert-success', 'Alterado com sucesso!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdmsTalhoes  $admsTalhoes
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdmTalhao $admsTalhoes)
    {
        //
    }
}
