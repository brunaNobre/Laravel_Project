<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Carango</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/master.css">
</head>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a href="/admin" class="w3-bar-item w3-right carango-logo">Carango</a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
        <div class="w3-col s4">
            <img src="/fotos/users/nina-simone.jpg" class="w3-circle w3-margin-right" style="width:46px">
        </div>
        <div class="w3-col s8 w3-bar">
            @php
               $user_name = explode(" ", Auth::user()->name);
               $first_name = $user_name[0];
            @endphp
            <span>Bem vindo(a), <strong>{{ $first_name }}</strong></span><br>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
               class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i></a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Menu</h5>
    </div>
    <div class="w3-bar-block">
        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Fechar Menu</a>
        <a href="{{route('carros.index')}}" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-car fa-fw"></i>  Carros</a>
        <a href="{{route('marcas.index')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-tags fa-fw"></i>  Marcas</a>
        <a href="{{route('propostas.index')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-money fa-fw"></i>  Propostas</a>
        <a href="{{route('carros.pesq')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-search fa-fw"></i>  Pesquisar carros</a>
        <a href="{{route('carros.graf')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-area-chart fa-fw"></i>  Gráficos</a>
        <a href="{{route('clientes.create')}}" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Clientes</a>
    </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    @yield('conteudo')

</div>

<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
