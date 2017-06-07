@extends('layouts.master')

@section('conteudo')

<div class='col-sm-11'>
    <h2> Pesquisa de Carros </h2>
</div>



<form method="post" action="{{route('carros.filtros')}}">
    {{ csrf_field() }}

    <div class='col-sm-4'>
        <div class="form-group">
            <label for="modelo">Modelo do Veículo:</label>
            <input type="text" class="form-control" id="modelo"
                   name="modelo">
        </div>
    </div>

    <div class='col-sm-4'>
        <div class="form-group">
            <label for="precomax">Preço Máximo R$:</label>
            <input type="text" class="form-control" id="precomax"
                   name="precomax">
        </div>
    </div>

    <div class='col-sm-2'>
        <br>
        <button type="submit" class="w3-button w3-dark-grey">Pesquisar <i class="fa fa-search"></i> </button>
    </div>
    <div class='col-sm-2'>
        <br>
        <a href="{{route('carros.pesq')}}" class="btn btn-primary"
           role="button">Ver Todos</a>
    </div>
</form>

<div class='col-sm-12'>

    @if (count($carros)==0)
    <div class="alert alert-danger">
        Não há carros com os filtros informados...
    </div>
    @endif    

    <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-ul w3-card-4">
        <thead>
            <tr>
                <th>Código</th>
                <th>Modelo do Veículo</th>
                <th>Marca</th>
                <th>Cor</th>
                <th>Ano</th>
                <th>Preço R$</th>
                <th>Combustível</th>
                <th>Data Cad.</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carros as $carro)
            <tr>
                <td style="text-align: center">{{$carro->id}}</td>
                <td>{{$carro->modelo}}</td>
                <td>{{$carro->marca->nome}}</td>
                <td>{{$carro->cor}}</td>
                <td>{{$carro->ano}}</td>
                <td style="text-align: right">{{number_format($carro->preco, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>
                <td>{{$carro->combustivel}}</td>
                <td>{{date_format($carro->created_at, 'd/m/Y')}}</td>
                <td>
                    <a href="{{route('carros.edit', $carro->id)}}" 
                       class="btn btn-warning" 
                       role="button">Alterar</a> &nbsp;&nbsp;
                    <form style="display: inline-block"
                          method="post"
                          action="{{route('carros.destroy', $carro->id)}}"
                          onsubmit="return confirm('Confirma Exclusão?')">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit"
                                class="btn btn-danger"> Excluir </button>
                    </form> &nbsp;&nbsp;
                    <a href="{{route('carros.foto', $carro->id)}}"
                       class="btn btn-default"
                       role="button"><i class="fa fa-camera fa-fw"></i></a>
                </td>
            </tr>
            @endforeach        
        </tbody>
    </table>    
    {{ $carros->links() }}
</div>

@endsection