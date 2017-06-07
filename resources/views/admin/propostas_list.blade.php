@extends('layouts.master')

@section('conteudo')

    <div class='col-sm-11'>
        <h2> Propostas </h2>
    </div>


    <div class='col-sm-12'>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-ul w3-card-4">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome do Cliente</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Veículo</th>
                <th>Proposta</th>

            </tr>
            </thead>
            <tbody>
            @foreach($propostas as $proposta)
                <tr>
                    <td style="text-align: center">{{$proposta->id}}</td>
                    <td>{{$proposta->nome_cliente}}</td>
                    <td>{{$proposta->email}}</td>
                    <td>{{$proposta->telefone}}</td>
                    <td>{{$proposta->carro->modelo}}</td>
                    <td style="text-align: right">{{number_format($proposta->proposta, '2', ',', '.')}} &nbsp;&nbsp;&nbsp;</td>

                    <td>
                        <a href="{{ route('propostas.resposta') }}"
                           class="btn btn-info"
                           role="button">Responder</a> &nbsp;&nbsp;
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $propostas->links() }}
    </div>

@endsection