@extends('layouts.master')

@section('conteudo')

    <div class='col-sm-8'>
        <h2> Cadastro de Marcas </h2>
    </div>
    <div class='col-sm-4'>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class='col-sm-12'>



        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-ul w3-card-4">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marcas as $marca)
                <tr>
                    <td style="text-align: center">{{$marca->id}}</td>
                    <td>{{$marca->nome}}</td>
                    <td>
                        <a href="{{route('marcas.edit', $marca->id)}}"
                           class="btn btn-warning"
                           role="button">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('marcas.destroy', $marca->id)}}"
                              onsubmit="return confirm('Confirma Exclusão?')">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <button type="submit"
                                    class="btn btn-danger"> Excluir </button>
                        </form> &nbsp;&nbsp;

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
         <div class="col-sm-11"> {{ $marcas->links() }}</div>
            <div class="col-sm-1">
                <br>
            <a href="{{route('marcas.create')}}" class="btn btn-info"
               role="button">Nova</a>
            </div>
    </div>

@endsection
