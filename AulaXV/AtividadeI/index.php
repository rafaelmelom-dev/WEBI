<!doctype html>
<html lang = "pt-br">
  <head>
    <meta charset = "UTF-8">
    <title>AtividadeI</title>
  </head>
  
  <body>
	
	<h1> Resultados </h1>

	<?php 
	
		$alunosNotas = array("Túlio" => 35, "Kensley" => 77, "Daniel" => 65, "Otávio" => 49, "Leandro" => 28, "Rafael" => 95);

		foreach ($alunosNotas as $nome => $nota) {
			if ($nota >= 60) {
				echo "<h2>$nome foi <b>aprovado</b> com $nota</h2>";
			} else {
				echo "<h2>$nome foi <b>reprovado</b> com $nota</h2>";
			}
		}
	
	?>

  </body>
</html>
