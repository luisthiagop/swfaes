@extends('layouts.app')

@section('content')

<div class="container col-md-10 col-lg-10 ">
    <div class="row mt-3">
        <div class="col-md-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
                <li class="breadcrumb-item"><a href="{{Route('tipo_item.index')}}">Tipos de Itens</a></li>
                <li class="breadcrumb-item active">Novo tipo de itens</li>
            </ol>
            <div class="card">

                <div class="card-header">

                    <h3>Cadastro de tipos
                        <button id = "showmodal" type="button" class="btn float-right" style="background: none">
                            <i class="fas fa-question-circle fa-2x"></i>
                        </button>
                    </h3>


                </div>

                <div class="card-body col-md-8 offset-lg-2" >

                    <form role="form" method="POST" action="{{ Route('tipo_item.store') }}">
                        {!! csrf_field() !!}


                        <div class="form-group row">
                            <label class="col-lg-4 col-form-label text-lg-right">Nome</label>

                            <div class="col-lg-4">
                                <input
                                        placeholder="Insira o nome do item"
                                        type="text"
                                        class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}"
                                        name="nome"
                                        value="{{ old('nome') }}"
                                        required
                                >
                                @if ($errors->has('nome'))
                                    <div class="invalid-feedback">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-lg-6 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </div>



                    </form>

                </div>

                <div id = "popup" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Help tipos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Nessa página é possível cadastrar os tipos de itens, por exemplo: o tipo Pecuaria.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(document).unbind("keyup").keyup(function(e){
        var code = e.which;
        if(code==112)
        {
        $("#popup").modal('show', 'handleUpdate');
        }
        });

        $('#showmodal').click(function() {
        $('#popup').modal('show');
        });
    </script>
@endsection
