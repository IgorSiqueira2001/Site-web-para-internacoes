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
            #btnVoltar{
                margin-left: 135px;
            }
            #body{
                background-color: lightblue;
                margin: 10px 20px;
                padding: 1px 20px;
                border-top: 7px solid black;
                border-bottom: 7px solid black;
                border-radius: 5px;
            }
            #lb1{
                margin-left: 90px;
            }
            #lb2{
                margin-left: 106px;
            }
            #lb3{
                margin-left: 87px;
            }
            #lb4{
                margin-left: 89px;
            }
            #lb5{
                margin-left: 3px;
            }
            #lb6{
                margin-left: 29px;
            }
            #lb7{
                margin-left: 10px;
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
            <?php 
                    require_once("Config.php");
                    use Modelo\Internacao;

                        $Internacao = new Internacao();
                        if(isset($_POST["enviar"])){
                            $valor = $_POST["enviar"];
                            if($valor=="Pesquisar"){
                                $id = $_POST['codigo'];                         
                                $Internacao = Internacao::getInternacaoCodigo($id);
                            }
                        }

                        if(isset($_GET["codigo"])){
                            $id = $_GET["codigo"];                     
                            $Internacao = Internacao::getInternacaoCodigo($id);
                        }
                    ?>
            <br>
            <div id="voltar">
                <h5>Cadastro de Internações</h5>
                <a href="FrontEnd.php" id="btnVoltar"><button type="button" class="btn btn-success">Voltar</button></a>
            </div>
            <div class="container">
                    <br>
                        <form action="Internacoes.php" method="POST">
                            <label id="lb1">Informe o codigo:</label>
                            <input type="number" name="codigo" value="<?=$Internacao->codigo?>"><br>
                            <label id="lb2">Informe a data:</label>
                            <input type="text" name="data" value="<?=$Internacao->data?>"><br>
                            <label id="lb3">Informe o horario:</label>
                            <input type="text" name="hora" value="<?=$Internacao->hora?>"><br>
                            <label id="lb4">Informe o motivo:</label>
                            <input type="text" name="motivo" value="<?=$Internacao->motivo?>"><br>
                            <label id="lb5">Informe a quantidade de dias:</label>
                            <input type="number" name="qtdeDiarias" value="<?=$Internacao->qtdeDiarias?>"><br>
                            <label id="lb6">Informe o valor do quarto:</label>
                            <input type="text" name="valorQuarto" value="<?=$Internacao->valorQuarto?>"><br>
                            <label id="lb7">Informe o nome do paciente:</label>
                            <input type="text" name="nomePaciente" value="<?=$Internacao->nomePaciente?>"><br>
                            <br>
                            <input type="submit" class="btn btn-success" name="enviar" value="Cadastrar">
                            <input type="submit" class="btn btn-success" name="enviar" value="Alterar">
                            <input type="submit" class="btn btn-success" name="enviar" value="Excluir">
                            <input type="submit" class="btn btn-success" name="enviar" value="Pesquisar">
                        </form>
            </div>
            <?php  
                if(isset($_POST["codigo"])){
                    $Internacao = new Internacao();
                    $Internacao->codigo = $_POST["codigo"];
                    $Internacao->data = $_POST["data"];
                    $Internacao->hora =$_POST["hora"];
                    $Internacao->motivo =$_POST["motivo"];
                    $Internacao->qtdeDiarias =$_POST["qtdeDiarias"];
                    $Internacao->valorQuarto =$_POST["valorQuarto"];
                    $Internacao->nomePaciente =$_POST["nomePaciente"];
                    $op = $_POST['enviar'];

                    if($op == 'Cadastrar'){
                        $Internacao->cadastrar(); 
                    }

                    elseif($op == 'Alterar'){
                        $Internacao->alterar();
                    }

                    elseif($op == 'Excluir'){
                        $Internacao->excluir();
                    }

                    else{
                        $Internacao=Internacao::listar();
                        include_once("Include/Listagem.php");
                    }
                }            
            ?>
        </div>
    </body>

</html>