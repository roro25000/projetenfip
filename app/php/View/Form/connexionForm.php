<div class="row justify-content-center">
<div class="col-sm-7">
    <div class="card text-center">
        <div class="card-header">
            <h3>Connexion</h3>
        </div>
        <div class="card-body">
            <p class="card-text">
            <form method="POST" action="espaceadherent.php">
                <div class="form-group">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" class="form-control" id="identifiant" name="identifiant" aria-describedby="identifiantAide" placeholder="Entrer votre identifiant">
                    <small id="identifiantAide" class="form-text text-muted">Merci de renseigner votre identifiant</small>
                </div>
                <div class="form-group">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Entrer votre mot de passe">
                </div>
                <!--                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>-->
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
        <div class="card-footer text-muted">
            mot de passe oublié ? 
        </div>
    </div>
</div>

</div>