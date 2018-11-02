<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>

<br>
<h4 class="title is-4">Cad. Clientes</h4>
<hr>
<div class="container">
    <a href="form_clientes.php" class="button is-primary">Incluir</a>
</div>
<br>
<div class="container">
<div class="table">
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
<thead>
<tr>
	<th>COD</th>
	<th>NOME</th>	
	<th>CPF</th>	
   	<th>AÇÕES</th>
    </tr>
</thead>

<tbody>
<?php
$rows = $PDO->query("SELECT * FROM CLIENTE");
while ($row = $rows->fetch (PDO::FETCH_ASSOC))
{
echo 
"<tr>
	<td><h5>$row[codcliente]</h5></td>
	<td><h5>$row[nomecliente]</h5></td>
	<td><h5>$row[cpf]</h5></td>			
    <td><h5><a href='form_clientes_edit.php?codcliente=$row[codcliente]'>Editar</a> - 
			<a href='delete_clientes.php?codcliente=$row[codcliente]'>Excluir</a></h5></td>
			</tr>";
}
?>
</tbody>
</table>
</div>
<?php include_once 'inc/footer.php'; ?>