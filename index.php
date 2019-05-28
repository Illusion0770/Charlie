<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<!--    <meta http-equiv="cache-control" content="max-age=0" />-->
<!--    <meta http-equiv="cache-control" content="no-cache" />-->
<!--    <meta http-equiv="expires" content="0" />-->
<!--    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />-->
<!--    <meta http-equiv="pragma" content="no-cache" />-->
    <title>LINVIX | Charlie</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/css/custom.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
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
            margin-bottom: 0px;
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
            background: #000000;
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
            width: 40%;
            margin-left: 30%;
            margin-top: 20px;
        }

        th{
            text-align:center;
        }

        .contador{
            color: white;
            position: fixed;
            margin-top: 2%;
            margin-left: 80%;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

    </style>

</head>
<body>
<div class="col-xs-12 principal">
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <strong>Monitor <tag class="Charlie">Charlie</tag> | LINVIX</h2></strong>
                        <div class="clearfix"></div>
                </div>
                    <div class="x_content">
                            <table class="table table-bordered">
                                <thead>
                                <tr><th>Vínculo:</th><th>Cliente:</th><th> Última integração:</th><th>Status:</th></tr>
                                </thead>
                                <tbody>
                                    <?php include("Charlie.php");?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
<div class="contador">
    <h2><?php include("Counter.php")?></h2>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->
<!-- jQuery-AutoComplete -->
<script src="/vendors/jquery.autocomplete.js"></script>
</body>
</html>