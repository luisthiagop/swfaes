@extends('layouts.app')
@section('style')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">

@endsection
@section('content')

<div class="container col-md-10 col-lg-10 ">
    <div class="row mt-3">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/inicio">Início</a></li>
                <li class="breadcrumb-item active">Funcionarios</li>
            </ol>
            <div class="card">
                <div class="card-header">


                    <h3>Listando funcionários
                        <button id = "showmodal" type="button" class="btn float-right" style="background: none">
                            <i class="fas fa-question-circle fa-2x"></i>
                        </button>
                    </h3>
                    <a href="{{Route('funcionarios.create')}}"><button type="button" class="btn btn-outline-success"><i class="fas fa-plus"></i> Cadastrar novo</button></a>





                </div>




                <div class="card-body">
                    <div class="flash-message">
                      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))

                            <div class="alert alert-{{ $msg }} alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <p class="mb-0">{{ Session::get('alert-' . $msg) }}</p>
                            </div>



                        @endif
                      @endforeach
                    </div>


                    <table id="data-table-funcionarios" class="table  table-striped">

                      <thead>
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Ações</th>

                        </tr>
                      </thead>

                    </table>
                </div>
            </div>

            <div id = "popup" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajuda funcionários</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Aqui é listado os funcionários. Para cada um deles é possível através de "Ações", editar ou ver.</p>
                            <p>Também é possível acessar a página de cadastro no botão superior "cadastrar novo".</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#data-table-funcionarios').DataTable({
        language:{
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },

        processing: true,
        serverSide: true,
        ajax: '{{ route('data_table_funcionarios') }}',
        columns: [

            {data: 'id_funcionarios', name:'id_funcionarios'},
            {data: 'nome', name: 'nome'},
            {data: 'cpf', name: 'cpf'},
            {data: 'action', name: 'action', orderable: false, searchable: false}

        ],
        fields:[
            {
                label: "First name:",
                name: "first_name"
            }
        ]
    });
});

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

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

@endsection