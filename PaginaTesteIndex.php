<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
    <title>Página Teste</title>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Bootstrap/css/bootstrap.css" type="text/css" charset="utf-8"/>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap-theme.css" type="text/css" charset="UTF-8"/>
        <link rel="stylesheet" href="Bootstrap/css/bootstrap-theme.min.css" type="text/css" charset="utf-8"/>
        <link rel="stylesheet" href="Bootstrap/css/custom-style.css" type="text/css" charset="utf-8"/>
        <?php
            include_once 'view/DesenhaView.php';
            include_once 'DAO/OcupacaoDAO.classe.php';
            include_once 'DAO/AcessoDadosPDO.php';
            
            $conectar = new AcessoDados();
            $bdQuery = new OcupacaoDAO();
            $desenhaTela = new Desenha();
        ?>
    </head>
    <body>
      
        <div class="container">
            <h1>Cadastro de ocupações</h1>
            <hr>
        </div>
        <div class="container">
        <!-- **************** Cadastro ***************** -->
            <div class="container row">
                <form method="GET" action="PaginaTesteIndex.php">
                    <div class="form-group col-6 col-lg-4 col-md-6 col-sm-6">
                        <label for="ocupacao">Digite a ocupação</label>
                        <input class="form-control" type="text" name="ocupacao" placeholder="">
                        <button type="submit" class="btn btn-success btn-block">Adicionar</button>
                        <?php
                            if(!empty($_GET['ocupacao']))
                            {
                                $objOcup = new Ocupacao();
                                $ocup = filter_input(INPUT_GET, 'ocupacao', FILTER_SANITIZE_STRING);
                                trim($ocup);
                                $objOcup->setNomeOcupacao($ocup);
                                $bdQuery->inserir($objOcup);
                                echo $desenhaTela->desenhaAlertaBootstrapSucesso("Registro inserido!");
                            }
                            else
                            {
                                echo $desenhaTela->desenhaAlertaBootstrapAviso("Preencha o campo <strong>Ocupaçao</strong>!");
                            }
                        ?>
                    </div>
                </form>
                
                <div class="col-6 col-lg-8 col-md-6 col-sm-6 style-unique">
        <!-- ***************** TABELA ******************* -->
                    <table class="table" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Ocupação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $desenhaTela->desenhaTabelaHTML($bdQuery->selecionar());
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     

        <!-- ******************************* SCRIPTS ******************************** -->
        <script src="Bootstrap/js/jquery.js" type="text/javascript" charset="utf-8"></script>
        <script src="Bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
        <script src="Bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>