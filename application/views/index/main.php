<div class="container">
    <?php if(! is_null($msg)): ?>
        <div class="alert alert-warning" role="alert">
            <?=$msg?>
        </div>
    <?php endif;?>

    <div class="row justify-content-center">
        <h3>Catalogo de llaves de software</h3>
    </div>
    <div class="row">
        <div id="catalog"></div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#catalog").jsGrid({
        height: "400px",
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
            { name: "soft_name", title: "Software",  type: "text" , validate: "required"},
            { name: "soft_description", title: "Descripcion", type: "textarea" , validate: "required"},
            { name: "soft_pid", title: "Asset Tag", type: "text" , validate: "required"},
            { name: "soft_key", title: "Llave", type: "text" , validate: "required"},
            { name: "soft_notes", title: "Notas", type: "textarea" , validate: "required"},
            { type: "control" }
        ]
    });
});
</script>