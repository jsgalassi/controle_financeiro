<?php include_once 'conex/conexao.php';

try 
{
	$codbanco = strtoupper($_POST['codbanco']);
	$nrobanco = strtoupper($_POST['nrobanco']);
	$razaosocial = strtoupper($_POST['razaosocial']);
	$nomefantasia = strtoupper($_POST['nomefantasia']);

	$sql = $PDO->prepare("UPDATE banco SET 
		codbanco = :codbanco, 
		nrobanco = :nrobanco,
        razaosocial = :razaosocial,
        nomefantasia = :nomefantasia
		WHERE 
		codbanco = :codbanco");
			$sql->bindParam(':codbanco', $codbanco);
			$sql->bindParam(':nrobanco', $nrobanco);
			$sql->bindParam(':razaosocial', $razaosocial);
            $sql->bindParam(':nomefantasia', $nomefantasia);			                        
			$sql->execute();

	header("location: listar_bancos.php");
}
catch
(PDOException $e)
{
	echo 'Não foi possivel realizar a alteração '. $e->getMessage();
}

?>
