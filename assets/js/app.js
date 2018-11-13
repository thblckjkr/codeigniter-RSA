/**
 * Little interface for the program
 * 
 * Author: TheoGC @thblckjk
 */
var encrypt = function(){
   this.worker;

   this.init = function(){
      this.worker = new JSEncrypt();
      var that = this;

      $.get("/keys/publickey", function(key){
         that.worker.setKey( key );
		});
   }
   
   this.crypt = function($data){
	   return this.worker.encrypt( $data );
   }
}

var en = new encrypt();
en.init();
dataControler = {
   loadData: function(filter) {
      return $.ajax({
         url: "/index/process/GET",
         dataType: "json",
         data: filter
      })
   },
   insertItem: function(data){
      console.log("inserting", data)
      data.soft_pid = en.crypt(data.soft_pid);
      data.soft_key = en.crypt(data.soft_key);
      $.ajax({
         url: "/index/process/INSERT",
         data: data,
         method: "POST",
         dataType: "json",
         success: function(res){
            if(res.info == false){
               alert("Hubo un error insertando");
            }
            $("#catalog").jsGrid("loadData");
         }
      })
   },
   updateItem: function(data){
		console.log("updating", data)
		data.soft_pid = en.crypt(data.soft_pid);
		data.soft_key = en.crypt(data.soft_key);
      $.ajax({
         url: "/index/process/UPDATE",
         data: data,
         method: "POST",
         dataType: "json",
         success: function(){
            $("#catalog").jsGrid("loadData");
         }
      })
   },
   deleteItem: function(data){
      console.log("deleting", data)
      $.ajax({
         url: "/index/process/DELETE",
         data: data,
         method: "POST",
         dataType: "json",
         success: function(){
            $("#catalog").jsGrid("loadData");
         }
      })
   }
}