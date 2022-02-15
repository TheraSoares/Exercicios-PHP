<?php
include("db.php");
$conexao = new Conexao();

if(isset($_POST['inserir'])){
    $nome = $_POST['nome'];

    $query_select_verify = "SELECT nome FROM produtos WHERE nome ='$nome'";

    $verify = mysqli_query($conexao->getConn(), $query_select_verify);
    $array_verify = mysqli_fetch_array($verify);
    
    if($array_verify['nome']==$nome){
        $erro = "Produto já existente";
    } else{
        $query_insert = "INSERT INTO produtos (nome) VALUES ('$nome')";
        mysqli_query($conexao->getConn(), $query_insert);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Site pagina dinamica</title>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h3>Produtos</h3>
        </div>
        
        <table class="table table-striped table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query_select = "SELECT nome FROM produtos";
                    $select = mysqli_query($conexao->getConn(), $query_select);
                    if (mysqli_num_rows($select) > 0) {
                        while ($uses = mysqli_fetch_array($select)) {
                            $product = $uses['nome'];
                            ?>
                            <tr>
                                <td><?php echo $product; ?></td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
                        
        </table>
        <?php
            if($erro<>null){
                echo $erro;
            }
        ?>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
</body>
</html>

