<script src="<?=asset_url()?>js/jsencrypt.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css">
 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>


<div class="container">
  <h3>Catalogo de llaves de software</h3>
  
</div>
<script type="text/javascript">
var en = new encrypt();
en.init();
// var data = en.crypt("Hola mundo!");
//data is avaiable for decryption in php


$(document).ready(function(){
    $("#catalog").jsGrid({
        height: "auto",
        width: "100%",

        autoload: true,
        inserting: true,
        editing: true,
        paging: true,
        selecting: true,
        loadonce: true,

        controller: dataControler,

        deleteConfirm: "¿Estás seguro de querer eliminarlo?",
        loadMessage : "Cargando datos",
    
        fields: 
        [
            { name: "soft_id",visible: false},
            { name: "soft_name", title: "Codigo de catalogo",  type: "text"},
            { name: "soft_description", title: "Descripcion", type: "text"},
            { name: "soft_pid", title: "Unidad", type: "text"},
            { name: "soft_key", title: "Cantidad", type: "text"},
            { name: "soft_notes", title: "Precio Unit.", type: "text"},
            { type: "control" }
        ]
    });
});

catalogControler = {
    loadData: function(filter) {
        return $.ajax({
            url: "/index/process",
            dataType: "json",
            data: filter
        })
    },
    insertItem: function(data){
        console.log("inserting", data)
        $("#grid").jsGrid("loadData");
    },
    updateItem: function(data){
        console.log("updating", data)
    },
    deleteItem: function(data){
        console.log("deleting", data)
    }
}
</script>

</script>