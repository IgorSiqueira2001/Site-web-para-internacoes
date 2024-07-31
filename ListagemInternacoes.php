<!DOCTYPE html>
<html>
    <head>
        <style>
            .a{
                color: white;
            }
            #voltar{
                display: inline-flex;
                margin-left: 30px;
            }
            #body{
                background-color: lightblue;
                margin: 10px 20px;
                padding: 1px 20px;
                border-top: 7px solid black;
                border-bottom: 7px solid black;
                border-radius: 5px;
            }
            #btnVoltar{
                margin-left: 1020px;
            }
        </style>
        <title>Hospital Santa Clara</title>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div id="topo" class="container">
            <h1>Hospital Santa Clara</h1>
        </div>
        <div id="body">
            <div id="topo" class="container"></div>
            <div class="container">
                <div id="btns">
                    <a href="Internacoes.php" class="a"><button type="button" class="btn btn-success">Internações</button></a>
                    <a href="ListagemInternacoes.php" class="a"><button type="button" class="btn btn-success">Listagem Internações</button></a>
                </div>
            </div>
            <div id="voltar">
                <h5>Listagem de Internações</h5>
                <a href="FrontEnd.php" id="btnVoltar"><button type="button" class="btn btn-success">Voltar</button></a>
            </div>
            <?php
                require_once("Config.php");
                use Modelo\Internacao;
                
                $Internacao = new Internacao();
                $Internacao=Internacao::listar();
                include_once("Include/ListagemInteira.php");
            ?>
        </div>
    </body>
</html>