<div class="container">
    <?php if(! is_null($msg)): ?>
        <div class="alert alert-warning" role="alert">
            <?=$msg?>
        </div>
    <?php endif;?>

    <div class="row justify-content-center">
        <h3>Lista de empleados</h3>
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
            { name: "empleado_id",visible: false},
            { name: "nombre", title: "Empleado",  type: "text" , validate: "required"},
            { name: "puesto", title: "Puesto", type: "text" , validate: "required"},
            { type: "control" }
        ]
    });
});
</script>