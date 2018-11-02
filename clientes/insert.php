<link href="../css/bulma.css" rel="stylesheet">
<?php include_once '../inc/header.php'; ?>
<?php include_once '../conex/conexao.php';?>

<?php
$nomecliente = strtoupper($_POST['nomecliente']);
$cpf = strtoupper($_POST['cpf']);

$sql = "insert into cliente
(
nomecliente,
cpf

) 
values 
(
'$nomecliente',
'$cpf'
)";
$stmt = $PDO->prepare ($sql);
$stmt->bindParam( 'nomecliente', $nomecliente);
$stmt->bindParam( 'cpf', $cpf);
$result = $stmt->execute();
 
if ( ! $result )
{
    ( $stmt->errorInfo() );
    exit;
} 
?>
<script language="JavaScript"> 
window.location="listar_clientes.php"; 
</script> 
<?php include_once '../inc/footer.php'; ?>
