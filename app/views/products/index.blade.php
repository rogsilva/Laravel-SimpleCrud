@extends('layouts.layout-admin')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <h2>Produtos</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{ URL::to('admin/products/new') }}" class="btn btn-info" title="Novo Produto"><i class="glyphicon glyphicon-plus"></i></a>
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
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($result as $product)
                
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                            <a href="{{ URL::to("admin/products/edit", array($product->id)) }}" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{{ URL::to("admin/products/delete", array($product->id)) }}" title="Remover" onclick="return confirm('Este registro será removido!')"><i class="glyphicon glyphicon-remove"></i></a>                            
                        </td>
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