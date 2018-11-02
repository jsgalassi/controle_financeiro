<link href="../css/bulma.css" rel="stylesheet">
<?php include_once '../inc/header.php'; ?>
<?php include_once '../conex/conexao.php';?>
<script language="javascript" src="../js/jquery-3.2.1.min.js.js"></script>
<script language="javascript" src="../js/jquery.mask.min.js"></script>
<script language="javascript" src="../js/bootstrap-notify.min"></script>

<br>
<h4 class="title is-4">Cad. Clientes</h4>
<hr>

<form action="insert.php" method="post">

  <div class="field is-mobile">
  <div class="control">
     <label class="campo1">Nome</label>
     <input class="input" type="text" placeholder="" name="nomecliente" id="nomecliente" style="text-transform:uppercase" required>
        
  
  <div class="control">
     <label class="campo2">CPF</label>
     <input class="input" type="text" placeholder="" name="cpf" id="cpf" style="text-transform:uppercase" required>
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
		<button type="submit" class="button is-link is-8-mobile">Salvar</button>
		<a href="listar_clientes.php" class="button is-danger is-8-mobile">Cancelar</a>
</div>
</div>
</center>
</form>

<?php include_once '../inc/footer.php'; ?>
