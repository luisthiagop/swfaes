@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
=======
<div class="container col-md-10 col-lg-10 ">
>>>>>>> eduardo
    <div class="row mt-5">
        <div class="col-md-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
                <li class="breadcrumb-item"><a href="{{Route('requisicoes.index')}}">Talhões</a></li>
                <li class="breadcrumb-item active">Novo Requisições</li>
            </ol>
            <div class="card">
<<<<<<< HEAD
                
=======

>>>>>>> eduardo
                <div class="card-header">


                    <h3>Cadastro de caderneta</h3>

                </div>

                <div class="card-body col-md-8 offset-lg-2" >
<<<<<<< HEAD
                    
=======

>>>>>>> eduardo
                    <form role="form" method="POST" action="{{ Route('talhoes.store') }}">
                        {!! csrf_field() !!}


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Identificação</label>

                            <div class="col-lg-6">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('identificacao') ? ' is-invalid' : '' }}"
                                        name="nome"
                                        value="{{ old('identificacao') }}"
                                        required
                                >
                                @if ($errors->has('identificacao'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('identificacao') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">



                            <label class="col-lg-4 col-form-label text-lg-right">Área</label>

                            <div class="col-lg-6">

                                <div class="input-group mb-3">
<<<<<<< HEAD
                                    
                                    <input 
                                        class="form-control"
                                        type="text"
                                        name="area" 
=======

                                    <input
                                        class="form-control"
                                        type="text"
                                        name="area"
>>>>>>> eduardo
                                    >
                                    <div class="input-group-append">
                                        <span class="input-group-text">m²</span>
                                    </div>
                                </div>

                                @if ($errors->has('area'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Descrição</label>

                            <div class="col-lg-6">
<<<<<<< HEAD
                                <textarea 
                                    class="form-control" 
                                    id="exampleTextarea" 
=======
                                <textarea
                                    class="form-control"
                                    id="exampleTextarea"
>>>>>>> eduardo
                                    rows="3"
                                    name="descricao"

                                ></textarea>
                                @if ($errors->has('descricao'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                          <label class="col-lg-4 col-form-label text-lg-right">Tipo</label>
                          <div class="col-lg-6">

                            <div class="custom-control custom-radio">
                              <input id="customRadio1" name="administrador_geral" class="custom-control-input" checked="" type="radio">
                              <label class="custom-control-label" for="customRadio1">Agricultura</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input id="customRadio2" name="administrador_geral" class="custom-control-input" type="radio">
                              <label class="custom-control-label" for="customRadio2">Pecuária</label>
                            </div>
                          </div>
<<<<<<< HEAD
                          
                        </div>

                        
                        
=======

                        </div>



>>>>>>> eduardo

                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
