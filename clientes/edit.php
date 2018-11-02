<?php include_once '../conex/conexao.php';

try 
{
	$codcliente = strtoupper($_POST['codcliente']);
	$nomecliente = strtoupper($_POST['nomecliente']);
	$cpf = strtoupper($_POST['cpf']);

	$sql = $PDO->prepare("UPDATE cliente SET 
		nomecliente = :nomecliente, 
		cpf = :cpf		
		WHERE 
		codcliente = :codcliente");
			$sql->bindParam(':codcliente', $codcliente);
			$sql->bindParam(':nomecliente', $nomecliente);
			$sql->bindParam(':cpf', $cpf);			                        
			$sql->execute();

	header("location: listar_clientes.php");
}
catch
(PDOException $e)
{
	echo 'Não foi possivel realizar a alteração '. $e->getMessage();
}

?>
