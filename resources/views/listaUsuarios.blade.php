<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">

    <title>Me Recruta ai</title>
    <style>
        body{
            margin-top: 20px;
        }
        .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 50%;
        }
        #divListagemCards{
            margin-left: 20px;
            margin-right: 20px;
        }
        .card{
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container" >
        <div class="card mb-3 text-center">
            <img class="card-img-top center " style="width: 100px;" src="{{asset('logo/logo.png')}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Me Recruta Ai!!!</h5>
              <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Usuário</span>
                    </div>
                    <input type="text" id="nomeUsuario" class="form-control">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Linguagem</span>
                    </div>
                    <input type="text" id="linguagem" class="form-control">
                    <button class="btn btn-success"  name="btnPesquisar" id="btnPesquisar" onclick="pesquisar();">
                        <i class="fas fa-search"></i>
                        Pesquisar
                    </button>
              </div>
            </div>
          </div>
    </div>
    <div class="row" id="divListagemCards">
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>

    function montarCard(item) {

        return '<div class="card" style="width: 18rem;">' +
                    '<img class="card-img-top" src="' + item.avatar_url + '" alt="Card image cap"> ' +
                    '<div class="card-body">' +
                        '<p class="card-text">' + item.login + '</p>' +
                    '</div>' +
               '</div>';
    }

    function carregarUsuarios() {
        $.getJSON('/api/usuarios', function(data) { 
            console.log(data['items']);

            $("#divListagemCards").html("");

            for(i=0; i < data['items'].length; i++) {
                var card = montarCard(data['items'][i]);
                $("#divListagemCards").append(card);
            }

            // $('#tabelaProdutos tbody').html('');
            // for(i=0;i<data.length;i++) {
            //     var linha = montarLinha(data[i]);
            //     $('#tabelaProdutos tbody').append(linha);
            // }
        });
    }

    // $(function() {
    //     carregarUsuarios();
    // });

    function pesquisar() {
        $.ajax({ type: "GET",
                 url: "api/usuarios/pesquisar",
                 context: this,
                 data: {nomeUsuario : $("#nomeUsuario").val(), linguagem : $("#linguagem").val() },
                 success: function(data) {
                    usuarios = JSON.parse(data);
// console.log(usuarios['items'][0]);
                    $("#divListagemCards").html('');
                    for(i=0; i < usuarios['items'].length; i++) {
                        var card = montarCard(usuarios['items'][i]);
                        $("#divListagemCards").append(card);
                    }
                 },
                 error: function (error) {
                     console.log(error);
                 }
        });
    }
</script>
</html>