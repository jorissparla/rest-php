<?php
require __DIR__ . '/vendor/autoload.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;

$paths = array("/path/to/entity-files");
$isDevMode = false;

// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_sqlsrv',
    'user'     => 'ps',
    'password' => 'm5Password',
    'dbname'   => 'ToolsSupport',
    'host'=> 'nlbavwixsdb1.infor.com'
);

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
$conn = DriverManager::getConnection($dbParams);

$sql = "SELECT acc_UIC id, acc_fullname name FROM t_accounts";
$stmt = $conn->query($sql);
while ($row = $stmt->fetch()) {
    echo $row['name'];
}