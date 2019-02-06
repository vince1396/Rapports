<body>
  <div class="container">
      <!-- ========================================================================================================= -->
      <div class="row loginRow">
          <div class="col s10 offset-s2 l6 offset-l5">
              <h4>Connexion</h4> <!-- Titre -->
          </div>
      </div>
      <!-- ========================================================================================================= -->
      <div class="row">
          <form action="#" method="post" class="col s12 l6 offset-l3">
              <!-- ================================================================================================= -->
              <div class="row">
                  <div class="input-field col s12">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="icon_prefix"
                             type="email"
                             class="validate"
                             name="email"
                             placeholder="Adresse email">
                      
                      <label for="email"
                             data-error="Adresse email non valide"
                             data-success="Ok"></label>
                  </div>
              </div>
              <!-- ================================================================================================= -->
              <div class="row">
                  <div class="input-field col s12">
                      <i class="material-icons prefix">lock</i>
                      <input
                              id="icon_lock"
                              type="password"
                              class="validate"
                              name="mdp"
                              placeholder="Mot de Passe">
                  </div>
              </div>
              <!-- ================================================================================================= -->
              <div class="row">
                  <div class="col s10 offset-s1 l8 offset-l4">
                      <input type="checkbox" name="remember" id="remember">
                      <label for="remember">Se souvenir de moi</label>
                  </div>
              </div>
              <!-- ================================================================================================= -->
              <div class="row">
                  <div class="col s10 offset-s1 l8 offset-l4">
                      <button
                              class="btn waves-effect waves-light"
                              type="submit"
                              name="submit"
                              value="submit">Se connecter
                          <i class="material-icons right">send</i>
                      </button>
                  </div>
              </div>
              <!-- ================================================================================================= -->
          </form>
      </div>
  </div>
      
      <?php
          if(isset($log))
          {
              echo $log;
          } ?>

</body>