<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="ISO-8859-1">
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
    <link href="css/custom.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    <link rel="icon" type="image/png" href="imgs/favicon.jpeg" />

    <style>
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

        #tabelaProdutosPedido{
            margin-bottom: 20px;
        }

        #formPrincipal {
            display: none;
        }

        .principal, body {
            background: #F7F7F7;
            min-height: 100%;
        }

        .small, small {
            font-size: 80%;
        }

        /*
        #divDaTabela {
            height: 400px; max-height: 500px; margin-bottom: 10px; overflow-y: scroll;
        }

        @media print {
            #divDaTabela {
                height: 400px; max-height: 500px; margin-bottom: 10px; overflow-y: visible;
            }
        }

        */
        @media print {
            thead {
                display: none;
            }



            .primeira * {
                font-weight: bold;
            }

        }

    </style>

</head>
<body>
<div class="col-xs-12 principal">
    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
                <h2>Charlie</h2>
                    <div class="clearfix"></div>
            </div>
                <div class="x_content">
                    <?php include("Charlie.php");?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>