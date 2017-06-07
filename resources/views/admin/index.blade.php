@extends('layouts.master')

@section('conteudo')

    <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">

            <div class="w3-twothird">
                <h5>Carango Dashboard</h5>
                <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white w3-ul w3-card-4">
                    <tr>
                        <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
                        <td>Novos registros.</td>
                        <td><i>10 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
                        <td>Erro no banco de dados.</td>
                        <td><i>15 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
                        <td>Novas vendas.</td>
                        <td><i>17 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
                        <td>Novas mensagens.</td>
                        <td><i>25 mins</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
                        <td>Novas compras.</td>
                        <td><i>28 mins</i></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Dados Gerais</h5>
        <p>Novos negócios</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
        </div>

        <p>Novos clientes</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
        </div>

        <p>Média de vendas</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
        </div>
    </div>



@endsection