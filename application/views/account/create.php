<div class="container">
   <div class="row justify-content-center">
      <h2 class="text-center">Iniciar sesi&oacute;n</h2>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <form action='<?=base_url();?>account/create/process' method='post' name='process'>
            <?php if(! is_null($msg)): ?>
               <div class="alert alert-warning" role="alert">
                  <?=$msg?>
               </div>
            <?php endif;?>

            <div class="form-group">
               <label for="user_nickname">Usuario</label>
               <input name="user_nickname" type="text" class="form-control" id="user_nickname" aria-describedby="user_nickname" placeholder="Pon tu nick">
               <small id="userhelp" class="form-text text-muted">El nombre que te fue dado al registrarte</small>
            </div>

            <div class="form-group">
               <label for="user_password">Password</label>
               <input name="user_password" type="user_password" class="form-control" id="user_password" placeholder="Password">
            </div>

            <div class="form-group">
               <label for="user_name">Nombre</label>
               <input name="user_name" type="text" class="form-control" id="user_name" aria-describedby="user_name" placeholder="Pon tu nick">
               <small id="userhelp" class="form-text text-muted">El nombre que te fue dado al registrarte</small>
            </div>

            <div class="form-group">
               <label for="user_lastname">Apellidos</label>
               <input name="user_lastname" type="text" class="form-control" id="user_lastname" aria-describedby="user_lastname" placeholder="Pon tu nick">
               <small id="userhelp" class="form-text text-muted">El nombre que te fue dado al registrarte</small>
            </div>

            <button type="submit" value="Login" class="btn btn-secondary">Inciar sesión</button>
         </form>
      </div>
      
   </div>
</div>