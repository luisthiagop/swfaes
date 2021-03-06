@extends('layouts.app')

@section('content')
<div class="container col-md-10 col-lg-10 ">
    <div class="row mt-3">
        <div class="col-md-12 ">
            <div class="card ">
                <div class="card-header"><h3>Início</h3></div>
                <div class="card-body">
                    <h4>Relatórios</h4>


                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <b>Atividades</b>
                                    </button>
                                </h5>
                            </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">

                                    <div class="card-body">


                                        <form action="{{action('RelatoriosController@atividades')}}" method="get">
                                            {!! csrf_field() !!}

                                            <h5>Filtro</h5>
                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Data de início</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <input name="data_inicio" class="form-control" type="date" value="2018-01-01" id="example-date-input">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Até</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <input name="data_fim" class="form-control" type="date" value="@php $dt = Carbon\Carbon::now();
    echo $dt->toDateString();  @endphp" id="example-date-input">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Tipo</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select  name="tipo" class="form-control" id="exampleSelect1">
                                                        <option value="">Selecione</option>
                                                        @foreach($tipos_atividades as $tipo)
                                                            <option value="{{$tipo->id_tipos_atividades}}">{{$tipo->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>


                                             <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Talhão</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select name="talhao" class="form-control" id="exampleSelect1">
                                                        <option value="">Selecione</option>
                                                        @foreach($talhoes as $talhao)
                                                            <option value="{{$talhao->id_talhoes}}">{{$talhao->identificador}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                           <!--  <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label">Cultura </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div> -->





                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10 ">
                                                    <button type="submit" class=" btn btn-primary">Gerar Relatório</button>
                                                </div>
                                            </div>



                                        </form>


                                    </div>


                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Estoque
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">

                                        <form action="{{action('RelatoriosController@estoque')}}" method="get">
                                            {!! csrf_field() !!}

                                            <h5>Filtro</h5>

                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Tipo</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select  name="tipo" class="form-control" id="exampleSelect1">
                                                        <option value="">Selecione</option>
                                                        @foreach($tipos_itens as $tipo)
                                                            <option value="{{$tipo->id_tipos_itens}}">{{$tipo->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>






                                           <!--  <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label">Cultura </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div> -->





                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10 ">
                                                    <button type="submit" class=" btn btn-primary">Gerar Relatório</button>
                                                </div>
                                            </div>



                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Fluxo de Caixa
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                        <form action="{{action('RelatoriosController@movimentacoes')}}" method="get">
                                            {!! csrf_field() !!}

                                            <h5>Filtro</h5>
                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Data de início</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <input name="data_inicio" class="form-control" type="date" value="2018-01-01" id="example-date-input">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-date-input" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Até</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <input name="data_fim" class="form-control" type="date" value="@php $dt = Carbon\Carbon::now();
    echo $dt->toDateString();  @endphp" id="example-date-input">
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Tipo</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select  name="tipo" class="form-control" id="exampleSelect1">
                                                        <option value="">Selecione</option>
                                                        <option value="E">Entrada</option>
                                                        <option value="S">Saída</option>

                                                    </select>
                                                </div>
                                            </div>


                                             <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"><b>Item específico</b> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select name="item" class="form-control" id="exampleSelect1">
                                                        <option value="">Selecione</option>
                                                        @foreach($itens as $item)
                                                            <option value="{{$item->id_itens}}">{{$item->nome}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>



                                           <!--  <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label">Cultura </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10">
                                                    <select class="form-control" id="exampleSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div> -->





                                            <div class="form-group row">
                                                <label for="exampleSelect1" class="col-md-3 col-lg-2 col-xs-10 col-form-label"> </label>
                                                <div class="col-md-3 col-lg-2 col-xs-10 ">
                                                    <button type="submit" class=" btn btn-primary">Gerar Relatório</button>
                                                </div>
                                            </div>



                                        </form>
                                    </div>
                                </div>
                        </div>
                    </div>


                    <!-- <hr>
                        <a href="{{Route('atividades-rel')}}"><button class="btn btn-primary" >Atividades</button></a>
                        <a href="{{Route('estoque-rel')}}"><button class="btn btn-primary" >Estoque</button></a>
                        <a href="{{Route('movimentacoes-rel')}}"><button class="btn btn-primary" >Fluxo de Caixa</button></a> -->

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
