 
 <div class="container">
    <div class="row">
        <div class="col-4" ></div>
        <div class="col-4" style="background-color:#f5f6f7; border-radius:10px; height:400px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
 <section class="sign-in">
                <div class="containerr">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure>
                                <?php if(isset($msg)&&$msg="e"){echo "<h3 class='erreur'>Vous devez vous inscrir !!</h3>";}?>
</figure>
                          


                        <div class="signin-form">
                            
                            <br><br>
                            <form method="POST" action="index.php?controller=utilisateur&action=connect" class="register-form" id="login-form" >
                                <div class="form-group">

                                    <label for="mail">E-mail :</label>
                                    <input type="mail" name="mail" id="mail" placeholder="username@exemple.com" required><br>
                                    <x-jet-input-error for="mail"></x-jet-input-error>
                                </div>
                                <div class="form-group">

                                    <label for="password">Mot de passe :</label>
                                    <input type="password" name="mdp" id="password" placeholder="Mot de passe.." required><br>
                                </div>
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>se souvenir de moi</label><br>
                                
                                <br>
                                                              <center>                
   <input type="submit" name="signin" id="signin" class="form-submit" value="Se connecter"/></center>
                           </fieldset> </form> 
                             </div>       
                             <hr>    
                             <center>                
  <a style="text-decoration:none; box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px; padding:8px; border-radius:8px; " href="index.php?controller=utilisateur&action=inscrit" class="signup-image-link">Créer un compte</a></center>
                        </div>
                    </div>
                </div>
            </section></div>
                    <div class="col-4"></div></div></div>
