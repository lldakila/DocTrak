<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
    $_SESSION['in'] ="start";
    header('Location:../../../../index.php');
}

//$key=$_SESSION['EncryptionKey'];
//define("ENCRYPTION_KEY", $_SESSION['EncryptionKey']);
/*$string = "This is the original data string!";

echo $encrypted = encrypt($string, ENCRYPTION_KEY);
echo "<br />";
echo $decrypted = decrypt($encrypted, ENCRYPTION_KEY);*/

/**
 * Returns an encrypted & utf8-encoded
 */
function encryptText($pure_string) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH,$_SESSION['EncryptionKey'], utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decryptText($encrypted_string) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH,$_SESSION['EncryptionKey'], $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}
?>