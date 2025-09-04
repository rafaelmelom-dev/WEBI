<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $endereco = htmlspecialchars(trim($_POST['endereco']));
    $experiencia = filter_var(trim($_POST['experiencia']), FILTER_VALIDATE_INT);
    $salario = filter_var(trim($_POST['salario']), FILTER_VALIDATE_FLOAT);

    if ($experiencia === false || $experiencia < 0) {
        die('Experiência inválida');
    }

    if ($salario === false || $salario < 0) {
        die('Salário inválido');
    }

    $sql = 'INSERT INTO Colaboradores (nome, numero_telefone, endereco, anos_experiencia, salario) VALUES (?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nome, $telefone, $endereco, $experiencia, $salario])) {
        header("Location: index.php");
        exit();
    }

    echo 'nada';
}

?>
