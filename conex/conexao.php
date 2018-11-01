<link href="../css/bulma.css" rel="stylesheet">

<?php
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'root' );
define( 'MYSQL_PASSWORD', '' );
define( 'MYSQL_DB_NAME', 'cfinanceiro' );

try
{
    $PDO = new PDO( 'mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    $PDO->exec("set names utf8");
}
catch ( PDOException $e )
{
    echo '<div class="alert alert-danger" role="alert">ERRO! Entre em contato com o Administrador.</div>'. $e->getMessage();
}
?>
