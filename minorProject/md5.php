<?php 
$encrypted = encryptIt($input);
$decrypted = decryptIt($encrypted);

function encryptIt($q)
{
  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
  $qEncoded = base64_encode(openssl_encrypt($q, 'AES-128-CBC', md5($cryptKey), OPENSSL_RAW_DATA, md5(md5($cryptKey))));
  return ($qEncoded);
}

function decryptIt($q)
{
  $cryptKey = 'qJB0rGtIn5UB1xG03efyCp';
  $qDecoded = rtrim(openssl_decrypt(base64_decode($q), 'AES-128-CBC', md5($cryptKey), OPENSSL_RAW_DATA, md5(md5($cryptKey))), "\0");
  return ($qDecoded);
}
?>
