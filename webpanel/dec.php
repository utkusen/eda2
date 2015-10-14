<?php

if(!isset($_POST) || empty($_POST['privatekey'])) {
	exit;
}

set_include_path(get_include_path() . PATH_SEPARATOR . 'lib');
include('lib/Crypt/RSA.php');

$rsa = new Crypt_RSA();

$privatekey = '<RSAKeyValue> <Modulus>ze80cinSTJIpHWtUqhspf6vr+fAQaDPkQrQ2A6ighTMIUDbcme3WzeHvrLomXA+p9Y1jSFX/HOu3H3/HwAeNWQ==</Modulus> <Exponent>AQAB</Exponent> <P>/5W0rEkQpL+lguE/LdHa+htpKKsdewETwdqAoOgOLGc=</P> <Q>zkTZpegAVwH52eduH7T0zrpeeuHOY6U5NgjLUl58YD8=</Q> <DP>jtsHhHDGa79u7Iun+51bjwY5LfEO5kzA1U6jLMzn9ys=</DP> <DQ>Q23eeI3PDqJmuwUcyuCs5qemGyWWAp0Qhsl5LgQVRKE=</DQ> <InverseQ>7iB3L1Vr2cBkkMVOwZsG7FjGNp+YDW+QL8zh5GajWus=</InverseQ> <D>SF6SqLgHvn7y0fLhCvKGr+ZEBE6YBXaO9d4MyVZeKtB1Adob4eQTWoiexGO7Y52SSK8exQbzp5v8CnUQay1BrQ==</D> </RSAKeyValue>';
$ciphertext = 'fYShkxt3aro8pI5fgfNcvzrclUVOUB0FU43kBldmxLbJD7dnmdosDvfrx+bzcAFv+RGY2a+AfGgSyYS85gg/ow==';
$rsa->loadKey($privatekey, CRYPT_RSA_PRIVATE_FORMAT_XML);
echo $privatekey;
//echo $rsa->decrypt(base64_decode($ciphertext));
?>