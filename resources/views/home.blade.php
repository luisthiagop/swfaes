@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Painel principal</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                    <div class="row">
                        <div style="border-right: 1px solid grey" class="col-md-7"><img width="90%" src="p1.png"></div>
                        <div class="col-md-4"><img width="130%" src="p2.png"></div>
                    </div>

<br>
                    <p>Partes que estão em dev:</p>
                    <ul>
                        <li>
                            <a href="{{Route('atividades.index')}}">Atividades</a>
                            <ul>
                                <li><a href="{{Route('atividades.create')}}">Novo</a></li>
                                <li><a href="{{Route('atividades.edit',2)}}">Editar</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="{{Route('culturas.index')}}">Culturas</a>
                            <ul>
                                <li><a href="{{Route('culturas.create')}}">Novo</a></li>
                                <li><a href="{{Route('culturas.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{Route('itens.index')}}">Itens</a>
                            <ul>
                                <li><a href="{{Route('itens.create')}}">Novo</a></li>
                                <li><a href="{{Route('itens.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{Route('movimentacoes.index')}}">Movimentações</a>
                            <ul>
                                <li><a href="{{Route('movimentacoes.create')}}">Novo</a></li>
                                <li><a href="{{Route('movimentacoes.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{Route('requisicoes.index')}}">Requisicoes</a>
                            <ul>
                                <li><a href="{{Route('requisicoes.create')}}">Novo</a></li>
                                <li><a href="{{Route('requisicoes.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{Route('talhoes.index')}}">Talhões</a>
                            <ul>
                                <li><a href="{{Route('talhoes.create')}}">Novo</a></li>
                                <li><a href="{{Route('talhoes.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{Route('usuarios.index')}}">Usuários</a>
                            <ul>
                                <li><a href="{{Route('usuarios.create')}}">Novo</a></li>
                                <li><a href="{{Route('usuarios.edit',1)}}">Editar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
