<?php session_start(); echo $_SESSION['id_users']; $id_users = $_SESSION['id_users']; ?>
<!doctype html> 
<html lang="fr">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
  <div class="row">
    <nav class="nav nav-pills offset-3 col-8">
        <a class="nav-item nav-link " href="#users" data-toggle="tab">Informations Générales</a>
        <a class="nav-item nav-link " href="#exp_pro" data-toggle="tab">Exprériences Professionnelles</a>
        <a class="nav-item nav-link " href="#trainings" data-toggle="tab">Formations</a>
        <a class="nav-item nav-link " href="#skills" data-toggle="tab">Compétences</a>
        <a class="nav-item nav-link " href="#realisations" data-toggle="tab">Réalisations</a>
        <a class="nav-item nav-link " href="#activities" data-toggle="tab">Activités</a>
    </nav>
  </div>
<div class="tab-content">  
    <div class="tab-pane active container-fluid" id="users">  
        <form method="post" action="../controllers/verification_creation_ctrl.php">
            <div class="row">
                <!-- input caché pour avoir le name button cliqué -->
              <!--  <input type="hidden" name="users" value="'.$data_menu['nom'].'" /> -->
                <div class="form-group offset-2 col-3">
                    <label for="texte">Nom : </label>
                    <input id="texte" type="text" class="form-control" name="name_user" >
                </div>
                <div class="form-group col-3 offset-2">
                    <label for="texte">Prénom : </label>
                    <input id="texte" type="text" class="form-control" name="lastname_user">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Date de naissance : </label>
                    <input id="texte" type="date" class="form-control" name="date_birth_user">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Adresse Postale : </label>
                    <input id="texte" type="text" class="form-control" name="address_user">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-3 offset-2">
                    <label for="texte">Téléphone : </label>
                    <input id="texte" type="text" class="form-control"  name="phone_user"  
                        placeholder="0xXXxxXXxx"
                        pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"
                        required >
                </div>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-3 offset-2">
                    <label for="texte">E-mail : </label>
                    <input id="texte" type="email" class="form-control" readonly>
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Titre du CV : </label>
                    <input id="texte" type="text" class="form-control" name="cv_title_user">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Handicap : </label>
                    <input id="texte" type="text" class="form-control" name="handicap_user">
                </div>    
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="offset-2 col-1">
                    <button type="submit" name="busers">Envoyer</button>
                </div>
            </div>    
        </form>        
    </div>

    <div class="tab-pane" id="exp_pro">
        <form method="post" action="../controllers/verification_creation_ctrl.php">
            <div class="row">
                <div class="form-group col-3 offset-2">
                    <!-- input caché pour avoir le name button cliqué -->
                    <input type="hidden" name="exp_pro" value="'.$data_menu['nom'].'" /> 
                    <label for="texte">Date de début : </label>
                    <input id="texte" type="date" class="form-control" name="start_date_exp">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Date de fin : </label>
                    <input id="texte" type="date" class="form-control" name="end_date_exp">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Nom de l'entreprise : </label>
                    <input id="texte" type="text" class="form-control" name="firm_name_exp">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-3 offset-2">
                    <label for="texte">Lieu : </label>
                    <input id="texte" type="text" class="form-control" name="location_exp">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Type de contrat : </label>
                    <input id="texte" type="text" class="form-control" name="type_contract_exp">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Mission : </label>
                    <input id="texte" type="text" class="form-control" name="mission_exp">
                </div>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="textarea">Détails : </label>
                    <textarea id="textarea" class="form-control" name="job_exp">Une description de vos taches ici</textarea>
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="offset-2 col-1">
                    <button type="submit" name="exp_pro" >Envoyer</button>
                </div>
            </div>       
        </form>
    </div>
    <div class="tab-pane " id="trainings">
        <form method="post" action="../controllers/verification_creation_ctrl.php">      
            <div class="row">
                <div class="form-group col-3 offset-2">
                    <!-- input caché pour avoir le name button cliqué -->
                    <input type="hidden" name="trainings" value="'.$data_menu['nom'].'" />  
                    <label for="texte">Date de début : </label>
                    <input id="texte" type="date" class="form-control" name="start_date_train">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Date de fin : </label>
                    <input id="texte" type="date" class="form-control" name="end_date_train">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Nom de l'école : </label>
                    <input id="texte" type="text" class="form-control" name="school_train">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-3 offset-2">
                    <label for="texte">Lieu : </label>
                    <input id="texte" type="text" class="form-control" name="location_train">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Titre : </label>
                    <input id="texte" type="text" class="form-control" name="title_train">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Nom du Diplôme  : </label>
                    <input id="texte" type="text" class="form-control" name="dipl_name_train">
                </div>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Diplôme validé : </label>
                    <input id="texte" type="text" class="form-control" name="dipl_validate_train">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="offset-2 col-1">
                    <button type="submit" name="trainings" >Envoyer</button>
                </div>
            </div>       
        </form>       
    </div>
    <div class="tab-pane" id="skills">
        <form method="post" action="../controllers/verification_creation_ctrl.php">
            <div class="row">
                <div class="form-group col-8 offset-2">
                <!-- input caché pour avoir le name button cliqué -->
                <input type="hidden" name="skills" value="'.$data_menu['nom'].'" />
                    <label for="texte">Titre : </label>
                    <input id="texte" type="text" class="form-control" name="title_skill">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Description : </label>
                    <input id="texte" type="text" class="form-control" name="desc_skill">
                </div>
                <div class="offset-2 col-1">
                    <button  type="submit" name="skills"  >Envoyer</button>
                </div>
            </div>       
        </form> 
    </div>
    <div class="tab-pane " id="realisations">
        <form method="post" action="../controllers/verification_creation_ctrl.php">
            <div class="row">
                <div class="form-group col-3 offset-2">
                    <!-- input caché pour avoir le name button cliqué -->
                    <input type="hidden" name="realisations" value="'.$data_menu['nom'].'" />
                    <label for="texte">Date de début : </label>
                    <input id="texte" type="date" class="form-control" name="start_date_rea">
                </div> 
                <div class="form-group col-3 offset-2">
                    <label for="texte">Date de fin : </label>
                    <input id="texte" type="date" class="form-control" name="end_date_rea">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Titre : </label>
                    <input id="texte" type="text" class="form-control" name="title_rea">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="form-group col-8 offset-2">
                    <label for="texte">Description : </label>
                    <input id="texte" type="text" class="form-control" name="desc_rea">
                </div> 
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="offset-2 col-1">
                    <button  type="submit" name="realisations" >Envoyer</button>
                </div>
            </div>       
        </form>
    </div>
    <div class="tab-pane" id="activities">
        <form method="post" action="../controllers/verification_creation_ctrl.php">
        <div class="row">
            <div class="form-group col-8 offset-2">
                <!-- input caché pour avoir le name button cliqué -->
                <input type="hidden" name="activities" value="'.$data_menu['nom'].'" />  
                <label for="texte">Titre : </label>
                <input id="texte" type="text" class="form-control" name="title_act">
            </div> 
            <!-- Force next columns to break to new line -->
            <div class="w-100"></div>
            <div class="form-group col-8 offset-2">
                <label for="texte">Description : </label>
                <input id="texte" type="text" class="form-control" name="desc_act">
            </div>
            <div class="offset-2 col-1">
                <button type="submit" name="activities">Envoyer</button>
            </div>
        </div>       
    </form> 
        </div>
    </div>
</div>

  
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>