<?php

class CrypTool {
   public $keyspath = "keys/";
   
   private $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "Ñ", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", " "];

   private $keyval;

   public function __construct($key = ""){
      $this->keys($key);
   }

   public function crypt($text)
   {
      $res = [];
      $text = strtoupper($text);
      $text_r = str_split($text);

      foreach( $text_r as $letter){
         $i = (array_search($letter, $this->alphabet) + $this->keyval) % count($this->alphabet) ;
         $res[] = $this->alphabet[$i];
      }
      $result = join($res);
      return $result;
   }

   public function decrypt($text)
   {
      $res = [];
      $text = strtoupper($text);
      $text_r = str_split($text);

      foreach( $text_r as $letter){
         $i = (array_search($letter, $this->alphabet) - $this->keyval);
         if ( $i < 0 ){
            $i += count($this->alphabet);
         }

         $res[] = $this->alphabet[$i];
      }

      $result = join($res);
      return $result;
   }
   
   // Verify and load the keys. If not exist, create new ones
   private function keys($key){
      $sum = 0;
      if ( file_exists( $this->keyspath . "key" ) == false ){
         // Default key if it is deleted
         file_put_contents( $this->keyspath . "key", "UNA LLAVE INTERESANTE");
      }

      // Create a new key, and get the numeric value of it
      $key = ($key == "") ? file_get_contents( $this->keyspath . "key" ) : $key;
      $key = strtoupper($key);
      $key_r = str_split($key);

      foreach( $key_r as $letter){
         if (is_numeric($letter)){
            $sum += $letter;
         }else{
            $sum += array_search($letter, $this->alphabet) + 1;
         }
      }

      // Get only one number of the numeric value
      while( count( str_split($sum) ) > 1 ){
         $newsum = 0;
         $array = str_split($sum);
         foreach( $array as $num ){
            $newsum += $num;
         }
         $sum = $newsum;
      }

      $this->keyval = $sum;

      return true;
   }
}