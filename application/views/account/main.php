<div class="container" id="proyects-landing">
   <div class="row justify-content-center">
      <h3>Modifica aqui tu informacion</h3>
   </div>
   <div class="row">
      <h4>
         Quieres eliminar tu cuenta? Presiona el siguiente boton
      </h4>
      <br>
      <form action='<?=base_url();?>account/index/delete' method='post' name='delete'>
         <button type="submit" value="Delete" class="btn btn-warning">Borrar mi cuenta</button>
      </form>
   </div>
</div>