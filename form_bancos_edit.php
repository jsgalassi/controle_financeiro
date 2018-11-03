<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>
<script language="javascript" src="js/jquery-3.2.1.min.js.js"></script>
<script language="javascript" src="js/jquery.mask.min.js"></script>
<br>
<h4 class="title is-4">Editar Bancos</h4>
<hr>
<?php
/*Linha 9 a 11 pega o ID que veio via GET e faz um SELECT para trazer no formulario apenas os dados  */
$codbanco = $_GET['codbanco'];
$rows = $PDO->query("SELECT * FROM banco where codbanco = '$codbanco'");
$row = $rows->fetch (PDO::FETCH_ASSOC);
?>
<!--Linha 14 envia dos dados alterados do formulario de edição para o arquivo edit.php via POST  -->
<form action="edit_bancos.php" method="post">
<!--Linha 16 não sei pra que serve, mais se excluir essa merda não funciona o editar  -->
<input type="hidden" class="form-control" name="codbanco" value="<?php echo $row['codbanco']?>" >
    
    
<?php /*?><div class="field is-mobile">
<div class="control">
<label class="campo1">Cod</label>
<input class="input" type="text" placeholder="" name="codbanco" id="codbanco" style="text-transform:uppercase" 
value="<?php echo $row['codbanco']?>disabled">
</div></div>  <?php */?> 
    
<div class="field is-mobile">
<div class="control">
<label class="campo1">Nro Banco</label>
<input class="input" type="text" placeholder="" name="nrobanco" id="nrobanco" style="text-transform:uppercase" 
value="<?php echo $row['nrobanco']?>">
</div></div>        
  
    <div class="control">
    <label class="campo2">Razão Social</label>
    <input class="input" type="text" placeholder="" name="razaosocial" id="razaosocial" style="text-transform:uppercase" 
    value="<?php echo $row['razaosocial']?>">
    </div>   
    

        <div class="field is-mobile">
        <div class="control">
        <label class="campo3">Nome Fantasia</label>
        <input class="input" type="text" placeholder="" name="nomefantasia" id="nomefantasia" style="text-transform:uppercase"
        value="<?php echo $row['nomefantasia']?>">
        </div>


<center>
<div id="actions" class="row">
	<div class="col-md-12">
	
		
		<button type="submit" class="button is-link">Salvar</button>
                <a href="listar_bancos.php" class="button is-danger">Cancelar</a>
</div>
</div>
</center>
</form>

<?php include_once 'inc/footer.php'; ?>
