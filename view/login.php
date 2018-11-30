<body>
  <div class="container">

    <div class="row title">
        <h1 class="col-lg-1  offset-5">Connexion</h1>
    </div>

    <div class="row">
      <div class="col-lg-6 offset-3">

        <form method="post" action="#">

          <div class="form-group row">
            <label for="staticEmail" class="col-lg-2 col-form-label"><span class="oi oi-person"></span></label>
            <div class="col-lg-10">
              <input type="text" class="form-control" id="staticEmail" placeholder="Adresse email" name="email">
            </div>
          </div>

          <div class="form-group row mdp">
            <label for="inputPassword" class="col-lg-2 col-form-label"><span class="oi oi-lock-locked"></span></label>
            <div class="col-lg-10">
              <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe" name="mdp">
            </div>
          </div>

          <div class="form-group row perso">
            <div class="checkbox col-lg-6 offset-5">
              <label>
                <input type="checkbox" value="">
                Se souvenir de moi
              </label>
            </div>
          </div>

          <div class="row">
            <button type="submit" class="btn btn-primary col-lg-4 offset-5">Se connecter</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</body>
