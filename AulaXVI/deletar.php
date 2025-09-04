<?php 
    include 'db.php';

    if (isset($_POST['id'])) {
        $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

        if ($id === false) {
            die('ID inválido');
        }

        $sql = 'DELETE FROM Colaboradores WHERE id = ?';
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$id])) {
            header("Location: index.php");
            exit();
        }
    }
?>