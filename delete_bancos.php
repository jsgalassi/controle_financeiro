<?php include_once 'conex/conexao.php';

try 
{
	$codbanco = isset($_GET['codbanco']) ? $_GET['codbanco'] : null;
	if (empty($codbanco)) {
		echo "Banco não encontrado";
		exit;
	}
	$sql = $PDO->prepare("DELETE FROM BANCO
			WHERE 
			codbanco = :codbanco");
			$sql->bindParam(':codbanco', $codbanco);		
			$sql->execute();
	header("location: listar_bancos.php");
}
catch
(PDOException $e)
{
	echo 'Não foi possui excluir o registro selecionado'. $e->getMessage();
}

?>


