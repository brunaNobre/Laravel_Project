@extends ('layouts.comercial.master')

@section('content')

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <!-- Header -->
        <div class="w3-container" style="margin-top:80px" id="showcase">
            <h1 class="w3-jumbo"><b>Escolha seu</b></h1>
            <h1 class="w3-xxxlarge w3-text-red"><b>Carango</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <!-- Photo grid -->
            <div class="row">
            @foreach($carros as $carro)

                    @php
                        if(file_exists(public_path('fotos/'.$carro->id.'.jpg'))){
                           $foto = '../fotos/'.$carro->id.'.jpg';
                        } else {
                           $foto = '../fotos/sem_foto.jpg';
                        }
                    @endphp

                @if($carro->destaque == 1)
                    <div class='col-sm-4' style="padding-bottom: 2vw;">
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
                                <li class="w3-light-grey w3-padding-24">
                                    <a href="{{route('propostas.show', $carro->id)}}" class="w3-button w3-red w3-padding-large w3-hover-black">Proposta</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                 @endif

             @endforeach
             </div>




         <!-- End page content -->
     </div>

 @endsection