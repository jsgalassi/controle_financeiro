<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>

<br>
<h4 class="title is-4">Cad. Bancos</h4>
<hr>
<div class="container">
    <a href="form_bancos.php" class="button is-primary">Incluir</a>
</div>
<br>
<div class="container">
<div class="table">
<table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
<thead>
<tr>
	<th>COD</th>
    <th>NRO BANCO</th>
	<th>RAZAO SOCIAL</th>
	<th>NOME FANTASIA</th>	
   	<th>AÇÕES</th>
    </tr>
</thead>

<tbody>
<?php
$rows = $PDO->query("SELECT * FROM banco");
while ($row = $rows->fetch (PDO::FETCH_ASSOC))
{
echo 
"<tr>
	<td><h5>$row[codbanco]</h5></td>
	<td><h5>$row[nrobanco]</h5></td>
    <td><h5>$row[razaosocial]</h5></td>
	<td><h5>$row[nomefantasia]</h5></td>			
    <td><h5><a href='form_bancos_edit.php?codbanco=$row[codbanco]'>Editar</a> - 
			<a href='delete_bancos.php?codbanco=$row[codbanco]'>Excluir</a></h5></td>
			</tr>";
}
?>
</tbody>
</table>
</div>
<?php include_once 'inc/footer.php'; ?>