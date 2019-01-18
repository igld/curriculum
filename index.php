<!doctype html>
<html lang="fr">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="../BIBLIOCODE/1.HTML.CSS/2-BOOTSTRAP/bootstrap-4.1.3-dist/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  
    <!-- Feuille de style CSS -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
      <div class="container">
          <form class="jumbotron" method="post" action="controllers/verification_connexion_ctrl.php">
              <div class="form-group row">
                  <label for="inputName" class="col-sm-1-12 col-form-label"></label>
                  <div class="col-sm-1-12">
                        <legend class="col-form-legend col-sm-1-12">E-mail</legend>  
                        <input type="email" class="form-control" name="mail" id="inputName" placeholder="">
                        <legend class="col-form-legend col-sm-1-12">Mot de passe</legend>
                        <input type="password" class="form-control" name="mdp" id="inputName" placeholder="">
                  </div>
              </div>
              <fieldset class="form-group row">
                  <div class="col-sm-1-12">
                  <input type="hidden" name="nomlien" value="'.$data_menu['nom'].'" />
                      
                  </div>
              </fieldset>
              <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" name="enregistrement">Enregistrement</button>
                      <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
                  </div>
              </div>
          </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>