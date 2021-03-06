<?php
error_reporting(0);

class AES256
{
    /**
     * Encrypt string
     *
     * @param string|numeric $text
     * @param string $passphrase
     * @return string
     * @throws \Exception
     */
    public static function encrypt($text, $passphrase)
    {
        $salt = openssl_random_pseudo_bytes(8);

        $salted = $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx . $passphrase . $salt, true);
            $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);

        // encrypt with PKCS7 padding
        return base64_encode('010101__' . $salt . openssl_encrypt($text . '', 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv));
    }

    /**
     * Decrypt string
     *
     * @param string $encrypted
     * @param string $passphrase
     * @return string|numeric
     * @throws \Exception
     */
    public static function decrypt($encrypted, $passphrase)
    {
        $encrypted = base64_decode($encrypted);
        $salted = substr($encrypted, 0, 8) == '010101__';

        if (!$salted) {
            return null;
        }

        $salt = substr($encrypted, 8, 8);
        $encrypted = substr($encrypted, 16);

        $salted = $dx = '';
        while (strlen($salted) < 48) {
            $dx = md5($dx . $passphrase . $salt, true);
            $salted .= $dx;
        }

        $key = substr($salted, 0, 32);
        $iv = substr($salted, 32, 16);

        return openssl_decrypt($encrypted, 'aes-256-cbc', $key, true, $iv);
    }
}


?>