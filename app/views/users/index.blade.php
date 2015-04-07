@extends('layouts.layout-admin')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <h2>Usuários</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ URL::to('admin/users/new') }}" class="btn btn-info" title="Novo Usuário"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
</div>
@if(Session::get('message'))
<div class="row">
    <div class="col-lg-12">
       {{ Session::get('message') }}
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($result as $user)
                
                    <tr>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td></td>
                    </tr>
                
                @empty
                    <tr>
                        <td colspan="5">Não há nenhum registro cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



@stop