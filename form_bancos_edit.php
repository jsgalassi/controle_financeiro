<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>
<script language="javascript" src="js/jquery-3.2.1.min.js.js"></script>
<script language="javascript" src="js/jquery.mask.min.js"></script>
<br>
<h4 class="title is-4">Editar Clientes</h4>
<hr>
<?php
/*Linha 9 a 11 pega o ID que veio via GET e faz um SELECT para trazer no formulario apenas os dados  */
$codcliente = $_GET['codcliente'];
$rows = $PDO->query("SELECT * FROM cliente where codcliente = '$codcliente'");
$row = $rows->fetch (PDO::FETCH_ASSOC);
?>
<!--Linha 14 envia dos dados alterados do formulario de edição para o arquivo edit.php via POST  -->
<form action="edit_clientes.php" method="post">
<!--Linha 16 não sei pra que serve, mais se excluir essa merda não funciona o editar  -->
<input type="hidden" class="form-control" name="codcliente" value="<?php echo $row['codcliente']?>" >
    
    <div class="field is-mobile">
  <div class="control">
     <label class="campo1">Nome</label>
     <input class="input" type="text" placeholder="" name="nomecliente" id="nomecliente" style="text-transform:uppercase" value="<?php echo $row['nomecliente']?>" >
        
  
  <div class="control">
     <label class="campo2">CPF</label>
     <input class="input" type="text" placeholder="" name="cpf" id="cpf" style="text-transform:uppercase" value="<?php echo $row['cpf']?>" >
  </div>   
    </div></div>
        <script type="text/javascript">
    $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
    })
        </script>


<center>
<div id="actions" class="row">
	<div class="col-md-12">
	
		
		<button type="submit" class="button is-link">Salvar</button>
                <a href="listar_clientes.php" class="button is-danger">Cancelar</a>
</div>
</div>
</center>
</form>

<?php include_once 'inc/footer.php'; ?>
