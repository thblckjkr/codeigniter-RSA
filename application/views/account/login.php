<div class="container">
   <div class="row justify-content-center">
      <h2 class="text-center">Iniciar sesi&oacute;n</h2>
   </div>
   <div class="row justify-content-center">
      <div class="col-md-4">
         <form action='<?=base_url();?>account/login/process' method='post' name='process'>
            <?php if(! is_null($msg)): ?>
               <div class="alert alert-warning" role="alert">
                  <?=$msg?>
               </div>
            <?php endif;?>

            <div class="form-group">
               <label for="username">Usuario</label>
               <input name="username" type="text" class="form-control" id="username" aria-describedby="username" placeholder="Pon tu nick">
               <small id="userhelp" class="form-text text-muted">El nombre que te fue dado al registrarte</small>
            </div>

            <div class="form-group">
               <label for="password">Password</label>
               <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

            <button type="submit" value="Login" class="btn btn-secondary">Inciar sesión</button>
         </form>
      </div>
      
   </div>
</div>