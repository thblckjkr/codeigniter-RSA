<?php
use phpseclib\Crypt\RSA;
define('CRYPT_RSA_PKCS15_COMPAT', true);

class RSATool {
   // PLEASE USE A SAFER DIRECTORY. THIS IS ONLY FOR DEMOSTRATION PURPOSES
   public $keyspath = "keys/";
   // RSA manager for the proyect
   private $rsa;

   public $errors = array();
   public $warnings = array();

   public function __construct(){
      $this->rsa = new RSA();
   }

   public function crypt($text)
   {
      $this->keys("public");
      $this->rsa->setEncryptionMode(RSA::ENCRYPTION_PKCS1);
      return $this->rsa->encrypt($text);
   }

   public function decrypt($text)
   {
      $this->keys("private");
      $this->rsa->setEncryptionMode(RSA::ENCRYPTION_PKCS1);
      return $this->rsa->decrypt($text);
   }
   
   // Verify and load the keys. If not exist, create new ones
   private function keys($type = "public"){
      if (
         file_exists( $this->keyspath . "privatekey" ) == false ||
         file_exists( $this->keyspath . "publickey" ) == false
      ){
         $keys = $this->rsa->createKey(1024);
         file_put_contents( $this->keyspath . "privatekey", $keys['privatekey']);
         file_put_contents( $this->keyspath . "publickey", $keys['publickey']);
      }
      switch($type){
         case "public":
            $key = file_get_contents( $this->keyspath . "publickey" );
            break;
         case "private":
            $key = file_get_contents( $this->keyspath . "privatekey" );  
            break;
      }

      $this->rsa->loadKey($key);
   }
}