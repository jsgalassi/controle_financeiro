<?php include_once 'conex/conexao.php';

try 
{
	$codcliente = isset($_GET['codcliente']) ? $_GET['codcliente'] : null;
	if (empty($codcliente)) {
		echo "Cliente não encontrado";
		exit;
	}
	$sql = $PDO->prepare("DELETE FROM CLIENTE
			WHERE 
			codcliente = :codcliente");
			$sql->bindParam(':codcliente', $codcliente);		
			$sql->execute();
	header("location: listar_clientes.php");
}
catch
(PDOException $e)
{
	echo 'Não foi possui excluir o registro selecionado'. $e->getMessage();
}

?>


