<body>
    <p>Profil</p>
    <p><?php echo $_SESSION['prenom'];  ?></p><br />
    <p><?php echo $_SESSION['nom'];     ?></p><br />
    <p><?php echo $_SESSION['email'];   ?></p><br />

    <form action="#" method="post">
        <label for="oldmdp">Mot de passe actuel : </label>
        <input type="password" name="oldmdp">
        <br />
        <label for="newmdp">Nouveau mot de passe :  </label>
        <input type="password" name="newmdp">
        <br />
        <label for="confirm">Confirmez le mot de passe : </label>
        <input type="password" name="confirm">
        <br />
        <input type="submit"   name="submit">
    </form>

    <p><?php echo $log; ?></p>
</body>
