<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlspecialchars(trim($_POST['id']));
    $nome = htmlspecialchars(trim($_POST['nome']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $endereco = htmlspecialchars(trim($_POST['endereco']));
    $experiencia = filter_var(trim($_POST['experiencia']), FILTER_VALIDATE_INT);
    $salario = filter_var(trim($_POST['salario']), FILTER_VALIDATE_FLOAT);

    if ($experiencia === false || $experiencia < 0) {
        echo $experiencia;
        die('Experiência inválida');
    }

    if ($salario === false || $salario < 0) {
        die('Salário inválido');
    }

    $sql = 'UPDATE Colaboradores SET 
    nome = ?, numero_telefone = ?, endereco = ?, 
    anos_experiencia = ?, salario = ? 
    WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nome, $telefone, $endereco, $experiencia, $salario, $id])) {
        header("Location: index.php");
        exit();
    }

    echo 'nada';
}

?>