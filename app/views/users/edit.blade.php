@extends('layouts.layout-admin')

@section('content')


<div class="row">
    <div class="col-lg-12">
        <h2>Editar Usuário</h2>
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
        {{ Form::open(array('url'=>"admin/users/edit/$entity->id")) }}
        
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('first_name', 'Nome') }}
                        {{ Form::text('first_name', $entity->first_name, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        {{ Form::label('last_name', 'Sobrenome') }}
                        {{ Form::text('last_name', $entity->last_name, array('class'=>'form-control')) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('email', 'E-mail') }}
                        {{ Form::email('email', $entity->email, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('password', 'Senha') }}
                        {{ Form::password('password', array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        {{ Form::label('password_confirmation', 'Confirmar Senha') }}
                        {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
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