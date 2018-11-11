/**
 * Little interface for the program
 * 
 * Author: TheoGC @thblckjk
 */

// This requires a container called appContainer on html
var encrypt = function(){

   var init = function(){
      $.get("/keys/publickey", function(key){
         crypt.setKey( key );
		});
   }
   
   var crypt = function($data){
      var crypt = new JSEncrypt();
	   return crypt.encrypt( $data );
   }
}