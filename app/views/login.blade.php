<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplicação básica com Laravel Framework">
    <meta name="author" content="Rogério Silva">
    <link rel="icon" href="/favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="row">            
            <div class="col-lg-offset-4 col-lg-4">
                {{ Form::open(array('url' => 'auth/check', 'class' => '')) }}
                    <h2 class="form-signin-heading">Entrar</h2>
                    
                    <div class="form-group">
                        <label for="inputEmail" class="sr-only">E-mail</label>
                        {{ Form::email('email', '', array('class'=>'form-control', 'placeholder'=>'E-mail', 'required'=>'required', 'autofocus'=>true)) }}
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="sr-only">Senha</label>
                        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Senha', 'required'=>'required')) }}
                    </div>                    
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('remember', 'remember-me', false)}} Manter conectado
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
                {{ Form::close() }}
                
            </div>  
        </div>
    </div> <!-- /container -->

</body>
</html>
