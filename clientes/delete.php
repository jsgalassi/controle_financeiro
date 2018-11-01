<?php include_once '../conex/conexao.php';

try 
{
	$CODCLIENTE = isset($_GET['CODCLIENTE']) ? $_GET['CODCLIENTE'] : null;
	if (empty($CODCLIENTE)) {
		echo "Codigo Cliente não Informado";
		exit;
	}
	$sql = $PDO->prepare("DELETE FROM CLIENTE
			WHERE 
			CODCLIENTE = :CODCLIENTE");
			$sql->bindParam(':CODCLIENTE', $CODCLIENTE);		
			$sql->execute();
	header("location: listar_clientes.php");
}
catch
(PDOException $e)
{
	echo 'Não foi possui excluir o registro selecionado'. $e->getMessage();
}

?>


