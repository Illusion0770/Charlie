<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>LINVIX | Charlie</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/custom.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="imgs/logo-mini.png" />

    <style>
        .Charlie{
            color: orangered;
            font-family: cursive;
        }

        .modal table i {
            font-size: 45px !important;
        }

        p {
            line-height: 20px !important;
            margin-bottom: 0    ;
        }

        #tabelaClientes td i {
            margin-top: 20%;
        }

        #tabelaClientes td:nth-child(1){
            width: 15%;
        }

        label, table *, button, a,  span, input, select, h5{
            font-size: 13px !important;
        }

        footer .pull-left, footer .pull-left span {
            font-size: 25px !important;
        }

        .principal, body {
            /*background: #000000;*/
            background: #eceff1 !important;
            min-height: 100%;
        }

        @media print {
            thead {
                display: none;
            }



            .primeira * {
                font-weight: bold;
            }

        }

        .Verificar{
            color: red;
        }

        .Verificar2{
            color: #f14600;
        }

        .Atualizado{
            color: #00a429;
        }

        .Counter{

        }

        .x_title{
            position: center;
            color: black;
            width: 100%;
        }

        .x_content{
            text-align: center;
            color: black;
        }

        .x_panel{
            width: 1100px;
            margin-left: 8%;
            margin-top: 20px;
        }

        th{
            text-align:center;
        }

        .contador{
            color: black;
            position: absolute;
            margin-top: -24px;
            margin-left: 77%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .sync{
            color: white;
            margin-top: -20pt;
            margin-right: 220px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            border-color: transparent;
        }

        .cliente{
            width: 500px;
            margin: -10px -125px -10px -125px;
            height: 30px;
            background-color: transparent;
            border-color: transparent;
        }


    </style>

</head>
<body>
<div class="col-xs-12">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <strong>Monitor <tag class="Charlie">Charlie</tag> | LINVIX</h2></strong>
                        <div class="clearfix"></div>
                <button type="submit" class="sync btn btn-primary pull-right" id="sync">Sincronizar</button>
                <div class="contador">
                    <h2><?php include("Counter.php")?></h2>
                </div>
                </div>
                    <div class="x_content">
                            <table id="TabelaListaBackup" class="table table-bordered">
                                <thead>
                                <tr><th>Vínculo:</th><th>Pasta:</th><th> Última leitura:</th><th>Status:</th></tr>
                                </thead>
                                <tbody>
                                    <?php include("Charlie.php");?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
<script src="/vendors/jquery-3.3.1/jquery-3.3.1.min.js"></script>
<script src="/vendors/jquery.autocomplete.js"></script>
<script src="/vendors/pnotify/dist/pnotify.js"></script>
<script src="/js/ListaClientes.js"></script>
<script src="/js/sync.js"></script>
</body>
</html>