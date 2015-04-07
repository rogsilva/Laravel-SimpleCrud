@extends('layouts.layout-admin')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <h2>Editar Produto</h2>
    </div>
</div>
@if(count($errors) > 0 )
<div class="row">
    <div class="col-lg-12">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(array('url'=>"admin/products/edit/$entity->id")) }}
        
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('code', 'Código') }}
                        {{ Form::text('code', $entity->code, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        {{ Form::label('description', 'Descrição') }}
                        {{ Form::text('description', $entity->description, array('class'=>'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {{ Form::submit('Salvar', array('class'=>'btn btn-success')) }}
                </div>
            </div>
        
        {{ Form::close() }}
    </div>
</div>



@stop