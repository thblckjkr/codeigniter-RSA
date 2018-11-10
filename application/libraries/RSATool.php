<?php
use phpseclib\Crypt\RSA;

class RSATool {
   // PLEASE USE A SAFER DIRECTORY. THIS IS ONLY FOR DEMOSTRATION PURPOSES
   public $keyspath = "application/keys/";
   // RSA manager for the proyect
   private $rsa;

   public $errors = array();
   public $warnings = array();

   public function __construct(){
      $this->rsa = new RSA();
      // Need to install XML, so not
      // $this->rsa->setPrivateKeyFormat(RSA::PRIVATE_FORMAT_XML);
      // $this->rsa->setPublicKeyFormat(RSA::PUBLIC_FORMAT_XML);
   }

   public function crypt($text)
   {
      $this->keys("public");
      return $this->rsa->encrypt($text);
   }

   public function decrypt($text)
   {
      $this->keys("private");
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