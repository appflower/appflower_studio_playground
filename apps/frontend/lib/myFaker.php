<?php
class Faker
{
    public static function encrypt($string)
    {
        $crypt = new sfCrypt(sfConfig::get('app_sfCrypt_mode'), sfConfig::get('app_sfCrypt_algorithm'), 
                sfConfig::get('app_sfCrypt_key'));
        return urlencode($crypt->encrypt($string));
    }
    
    public static function decrypt($string)
    {
        $crypt = new sfCrypt(sfConfig::get('app_sfCrypt_mode'), sfConfig::get('app_sfCrypt_algorithm'), 
                sfConfig::get('app_sfCrypt_key'));
        return $crypt->decrypt(urldecode($string));
    }
}
?>