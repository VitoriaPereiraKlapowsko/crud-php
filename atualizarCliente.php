<?php
    require 'Banco.php';
    require 'Cliente.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $cliente = new Cliente($conexao);

    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEmail($_POST['email']);
    $cliente->setCPF($_POST['cpf']);

    if ($cliente->update()) {
        $mensagem = "Cliente atualizado com sucesso!";
    } else {
        $mensagem = "Erro ao atualizar o cliente.";
    }
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refresh</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body style="height: 100%; display: flex; justify-content: center; align-items: center;">
    <div class="container" style="text-align: center; margin-top: 180px;">
        <img src="img/relogio.jpg" alt="Logo" style="max-width: 150px; height: auto; margin-bottom: 20px;">

        <h3><?php echo $mensagem; ?></h3>
        <h5>Você será direcionado para a lista de clientes em instantes...</h5>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "listarCliente.php"; 
        }, 5000); 
    </script>
</body>
</html>
