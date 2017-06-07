@extends ('layouts.comercial.master')

@section ('content')



    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1 class="w3-jumbo"><b>Faça sua</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>proposta</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>



        <form method="post" action="{{route('propostas.store')}}" style="float: left; width: 60%;">
            {{ csrf_field() }}
            <div class="w3-section">
                <label for="nome">Nome</label>
                <input class="w3-input w3-border" type="text" name="nome" id="nome">
            </div>
            <div class="w3-section">
                <label for="email">E-mail</label>
                <input class="w3-input w3-border" type="email" name="email" id="email">
            </div>
            <div class="w3-section">
                <label for="telefone">Telefone</label>
                <input class="w3-input w3-border" type="text" name="telefone" id="telefone">
            </div>
            <div class="w3-section">
                <label for="proposta">Valor da proposta R$:</label>
                <input class="w3-input w3-border" type="text" name="proposta" id="proposta">
            </div>

            <input type="hidden" name="id" value="{{$carro->id}}">

            <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Enviar</button>
        </form>

        @php
            if(file_exists(public_path('fotos/'.$carro->id.'.jpg'))){
                           $foto = '/fotos/'.$carro->id.'.jpg';
                        } else {
                           $foto = '/fotos/sem_foto.jpg';
                        }
        @endphp


        <div class='col-sm-4' style="margin-top: -21%">
            {!!"<img src='$foto' style='width:100%; height: 18vw;' >"!!}
            <div class="w3-row">
                <ul class="w3-ul w3-light-grey w3-center">
                    <li class="w3-red w3-xlarge w3-padding-32">{{$carro->modelo}}</li>
                    <li class="w3-padding-16">{{$carro->ano}}</li>
                    <li class="w3-padding-16">{{$carro->marca->nome}}</li>
                    <li class="w3-padding-16">{{$carro->combustivel}}</li>
                    <li class="w3-padding-16">
                        <h2>{{number_format($carro->preco, '2', ',', '.')}}</h2>
                    </li>

                </ul>



            </div>











    <!-- End page content -->
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
        <script>
            $(document).ready(function () {
                $('#proposta').mask('000.000.000.000.000,00', {reverse: true});
            });
        </script>

@endsection