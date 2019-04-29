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
      $text_r = mb_str_split($text);

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
      $text_r = mb_str_split($text);

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

function mb_str_split($string, $split_length = 1)
{
    if ($split_length == 1) {
        return preg_split("//u", $string, -1, PREG_SPLIT_NO_EMPTY);
    } elseif ($split_length > 1) {
        $return_value = [];
        $string_length = mb_strlen($string, "UTF-8");
        for ($i = 0; $i < $string_length; $i += $split_length) {
            $return_value[] = mb_substr($string, $i, $split_length, "UTF-8");
        }
        return $return_value;
    } else {
        return false;
    }
}