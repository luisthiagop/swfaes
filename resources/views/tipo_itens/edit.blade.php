@extends('layouts.app')

@section('content')

<div class="container col-md-10 col-lg-10 ">
    <div class="row mt-3">
        <div class="col-md-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
                <li class="breadcrumb-item"><a href="{{Route('unidades.index')}}">Unidades</a></li>
                <li class="breadcrumb-item active">Editar unidade</li>
            </ol>
            <div class="card">

                <div class="card-header">

                    <h3>Edição de unidade</h3>


                </div>

                <div class="card-body col-md-8 offset-lg-2" >

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="POST" action="{{ Route('tipo_item.update',[$tipo->id_tipos_itens]) }}">
                        {{ method_field('PUT') }}
                        {!! csrf_field() !!}


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Nome</label>

                            <div class="col-lg-4">
                                <input
                                        placeholder="Insira o nome do item"
                                        type="text"
                                        class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                        name="nome"
                                        value="{{ $tipo->nome }}"
                                        required
                                >
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Sigla</label>

                            <div class="col-lg-2">
                                <input
                                        type="text"
                                        class="form-control{{ $errors->has('sigla') ? ' is-invalid' : '' }}"
                                        name="sigla"
                                        value="{{ $tipo->sigla }}"
                                        required
                                >
                                @if ($errors->has('sigla'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('sigla') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div> -->







                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Alterar
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

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

@endsection
