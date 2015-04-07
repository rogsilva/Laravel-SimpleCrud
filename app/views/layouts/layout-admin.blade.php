<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplicação básica com Laravel Framework">
    <meta name="author" content="Rogério Silva">
    <link rel="icon" href="/favicon.ico">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style("assets/css/bootstrap.min.css") }}
    
    {{ HTML::script("assets/js/jquery.js") }}
    {{ HTML::script("assets/js/bootstrap.min.js") }}

</head>

<body>
    
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('admin') }}">CRUD</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  <li class=""><a href="{{ URL::to('admin/users') }}">Usuários</a></li>
                  <li><a href="{{ URL::to('admin/products') }}">Produtos</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Sair</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">

        @yield('content')
        
    </div> <!-- /container -->
    
    <footer>
        <span>&copy; Todos os direitos reservados.</span>
    </footer>

</body>
</html>
