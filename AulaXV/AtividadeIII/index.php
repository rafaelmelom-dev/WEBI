<!doctype html>
<html lang = "pt-br">
  <head>
    <meta charset = "UTF-8">
    <title>AtividadeIII</title>
	<style>
		table, table td {
			border: 1px solid black;
			font-size: 2rem;
		}
	</style>
  </head>
  
  <body>
	<?php

		$produtos = array(
			array(
				"nome"      => "Smartphone",
				"preco"     => 2300.00,
				"quantidade" => 25
			),
			array(
				"nome"      => "Carregador Portátil",
				"preco"     => 120.00,
				"quantidade" => 100
			),
			array(
				"nome"      => "Fone de Ouvido Bluetooth",
				"preco"     => 350.99,
				"quantidade" => 80
			)
		);	
	?>

	<table>
		<?php
			foreach ($produtos as $produto) {
				echo '<tr>' . 
					'<td>' . $produto['nome'] . '</td>' . 
					'<td>' . $produto['preco'] . '</td>' .
					'<td>' . $produto['quantidade'] . '</td>' .
				'</tr>';
			}
		?>
	</table>
  </body>
</html>
