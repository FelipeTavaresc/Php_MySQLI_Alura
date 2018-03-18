<?php

include("cabecalho.php");
include("conecta.php");
include("banco-produto.php");

?>

<?php
	if (array_key_exists("removido", $_GET) && $_GET["removido"]=="true" ) {
		echo "<p class='alert-success'>Produto removido com sucesso</p>";
	}

?>


<table class="table table-striped table-bordered">
	<?php
		$produtos = listaProdutos($conexao);
		foreach ($produtos as $key => $produto) :
	?>
	<tr>
		<td><?= $produto['nome'] ?></td>	
		<td><?= $produto['preco'] ?></td>
		<td><?= substr($produto['descricao'], 0, 40) ?></td>
		<td>
			<form action="remove-produto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto['id']?>">
				<button class="btn btn-danger">remover</button>
			</form>
		</td>
	</tr>
	<?php
		endforeach
	?>

</table>

<?php include("rodape.php")  ?>