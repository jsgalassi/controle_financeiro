<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>
<script language="javascript" src="js/jquery-3.2.1.min.js.js"></script>
<script language="javascript" src="js/jquery.mask.min.js"></script>
<script language="javascript" src="js/bootstrap-notify.min"></script>

<br>
<h4 class="title is-4">Cad. Bancos</h4>
<hr>

<form action="insert_bancos.php" method="post">

  <div class="field is-mobile">
  <div class="control">
     <label class="campo1">Nro Banco</label>
     <input class="input" type="text" placeholder="" name="nrobanco" id="nrobanco" style="text-transform:uppercase" required>
        
  
  <div class="control">
     <label class="campo2">Razão Social</label>
     <input class="input" type="text" placeholder="" name="razaosocial" id="razaosocial" style="text-transform:uppercase" required>
  </div>   
    </div></div>
    
    <div class="field is-mobile">
  <div class="control">
     <label class="campo3">Nome Fantasia</label>
     <input class="input" type="text" placeholder="" name="nomefantasia" id="nomefantasia" style="text-transform:uppercase" required>             
        </div></div>
<center>
<div id="actions" class="row">
	<div class="col-md-12">
		<button type="submit" class="button is-link is-8-mobile">Salvar</button>
		<a href="listar_bancos.php" class="button is-danger is-8-mobile">Cancelar</a>
</div>
</div>
</center>
</form>

<?php include_once 'inc/footer.php'; ?>
