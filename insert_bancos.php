<link href="css/bulma.css" rel="stylesheet">
<?php include_once 'inc/header.php'; ?>
<?php include_once 'conex/conexao.php';?>

<?php
$nrobanco = strtoupper($_POST['nrobanco']);
$razaosocial = strtoupper($_POST['razaosocial']);
$nomefantasia = strtoupper($_POST['nomefantasia']);

$sql = "insert into BANCO
(
nrobanco,
razaosocial,
nomefantasia

) 
values 
(
'$nrobanco',
'$razaosocial',
'$nomefantasia'
)";
$stmt = $PDO->prepare ($sql);
$stmt->bindParam( 'nrobanco', $nrobanco);
$stmt->bindParam( 'razaosocial', $razaosocial);
$stmt->bindParam( 'nomefantasia', $nomefantasia);
$result = $stmt->execute();
 
if ( ! $result )
{
    ( $stmt->errorInfo() );
    exit;
} 
?>
<script language="JavaScript"> 
window.location="listar_bancos.php"; 
</script> 
<?php include_once 'inc/footer.php'; ?>
