<?php session_start(); echo "Utilisateur Mail:  ".$_SESSION['mail']; $id_users = $_SESSION['id_users']; include("../controllers/init_id_a_afficher.php"); ?>

<!doctype html> 
<html lang="fr">
  <head>
    <title>CV Dynamique</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js'></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
    <!-- Feuille de style CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript">
        $(document).ready(function(){
            //sélection de la tab active et mémorisation pour la retrouver activé lorsque l'on revient dessus
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if(activeTab){
                $('#myTab a[href="' + activeTab +'"]').tab('show');
            }
            //initialisation des boutons radio
            $('#oui').attr('checked', true);
            $('#non').attr('checked', false);
        });
        function deleteLocalStorage(){
            localStorage.removeItem('activeTab');
        }
    </script>

</head>
  <body>
    <div id="top"><a id="myLink" href="../controllers/deconnexion.php" onclick="deleteLocalStorage();"> Déconnexion</a></div>
    <div class="row">
        <nav class="nav nav-pills offset-3 col-8" id="myTab">
            <a class="nav-item nav-link active" href="#users" data-toggle="tab">Informations Générales</a>
            <a class="nav-item nav-link " href="#exp_pro" data-toggle="tab">Exprériences Professionnelles</a>
            <a class="nav-item nav-link " href="#trainings" data-toggle="tab">Formations</a>
            <a class="nav-item nav-link " href="#skills" data-toggle="tab">Compétences</a>
            <a class="nav-item nav-link " href="#realisations" data-toggle="tab">Réalisations</a>
            <a class="nav-item nav-link " href="#activities" data-toggle="tab">Activités</a>
            <a class="nav-item nav-link " href="cv.php" >Aperçu du CV</a>
            <!-- <button  onclick="goPdf()" >PDF</a>  Fonction non valde pour le moment!-->
        </nav>
    </div>
    <br>
    <div class="tab-content offset-1 col-10">  
        <div class="tab-pane active container-fluid jumbotron" id="users"  ng-app='usersAppli' ng-controller="usersControleur">  
            <form method="post" action="../controllers/verification_creation_ctrl.php">
                <div class="row" ng-repeat="users in users">
                    <!-- input caché pour avoir le name button cliqué -->
                <!--  <input type="hidden" name="users" value="'.$data_menu['nom'].'" /> -->
                    <div class="form-group offset-2 col-3">
                        <label for="texte">Nom : </label>
                        <input id="texte" type="text" class="form-control" name="name_user" value={{users.name_user}} >
                    </div>
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Prénom : </label>
                        <input id="texte" type="text" class="form-control" name="lastname_user" value={{users.lastname_user}}>
                    </div> 
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Date de naissance : </label>
                        <input id="texte" type="date" class="form-control" name="date_birth_user" value={{users.date_birth_user}}>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="texte">Adresse Postale : </label>
                        <input id="texte" type="text" class="form-control" name="address_user" value={{users.address_user}}>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Téléphone : </label>
                        <input id="texte" type="text" class="form-control"  name="phone_user"  
                            placeholder="0xXXxxXXxx"
                            pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"
                            required value={{users.phone_user}}>
                    </div>
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-3 offset-2">
                        <label for="texte">E-mail : </label>
                        <input id="texte" type="email" class="form-control" readonly value={{users.mail_user}}>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="texte">Titre du CV : </label>
                        <input id="texte" type="text" class="form-control" name="cv_title_user" value={{users.cv_title_user}}>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="texte">Handicap : </label>
                        <input id="texte" type="text" class="form-control" name="handicap_user" value={{users.handicap_user}}>
                    </div>    
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="offset-2 col-2">
                        <button type="submit" name="busers">Mise à jour</button>
                    </div>
                </div>    
            </form>  
        </div>
        <div class="tab-pane jumbotron" id="exp_pro"  >
            <form method="post" action="../controllers/verification_creation_ctrl.php">
                <div class="row" >
                    <div class="form-group col-3 offset-2">
                        <!-- input caché pour avoir le name button cliqué -->
                        <input type="hidden" name="exp_pro" value="'.$data_menu['nom'].'" /> 
                        <label for="texte">Date de début : </label>
                        <input id="texte" type="date" class="form-control" name="start_date_exp"  value="">
                    </div> 
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Date de fin : </label>
                        <input id="texte" type="date" class="form-control" name="end_date_exp" value="">
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="texte">Nom du Métier : </label>
                        <input id="texte" type="text" class="form-control" name="job_exp" value="">
                    </div>
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="texte">Nom de l'entreprise : </label>
                        <input id="texte" type="text" class="form-control" name="firm_name_exp" value="">
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Lieu : </label>
                        <input id="texte" type="text" class="form-control" name="location_exp" value="">
                    </div> 
                    <div class="form-group col-3 offset-2">
                        <label for="texte">Type de contrat : </label>
                        <input id="texte" type="text" class="form-control" name="type_contract_exp" value="">
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="form-group col-8 offset-2">
                        <label for="textarea">Détails : </label>
                        <textarea id="textarea" class="form-control" name="mission_exp" value=""></textarea>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="offset-2 col-1">
                        <button type="submit" name="exp_pro" >Ajouter</button>
                    </div>
                </div>       
            </form>
            <!-- Création de l'Aperçu Expériences professionnelles avec possiibilité de supprimer les informations -->
            <div >
                <h2>Expériences professionnelles</h2>
                <hr>
                <div id="ng_exp_pro" ng-app="expProAppli" ng-controller="expProControleur"> 
                    <form method="post" action="../controllers/verification_delete_ctrl.php">
                        <p ng-repeat="exp_pro in exp_pro">
                            <table>
                                <tr>
                                    <td><strong>{{exp_pro.start_date_exp  | date:'dd MMM yyyy'}} / {{exp_pro.end_date_exp  | date:'dd MMM yyyy'}}</strong></td>
                                    <td><strong>{{exp_pro.job_exp}}</strong> ({{exp_pro.type_contract_exp}})<br>{{exp_pro.firm_name_exp}} à {{exp_pro.location_exp}}.<br>{{exp_pro.mission_exp}}</td>    
                                </tr>
                            </table>
                            <button type="submit" name="exp_pro" value={{exp_pro.id_exp}}>supprimer</button>
                            <button  name="m_exp_pro" id="m_exp_pro" value={{exp_pro.id_exp}} >Modifier</button> 
                        </p>
                    </form>
                </div>
            </div>      
        </div>
         <!-- Gestion de la formation (trainings") -->
        <div class="tab-pane jumbotron" id="trainings">
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
                        <input type="radio" name="dipl_validate_train" value="1" id="oui" /> <label class="form-check-label" for="oui">oui</label>
                        <input type="radio" name="dipl_validate_train" value="0" id="non" /> <label  class="form-check-label" for="non">non</label>
                    </div> 
                    <!-- Force next columns to break to new line -->
                    <div class="w-100"></div>
                    <div class="offset-2 col-1">
                        <button type="submit" name="trainings" >Ajouter</button>
                    </div>
                </div>       
            </form>
            <h2>Diplômes & Formations</h2>  
            <hr>
            <div id="ng_trainings" ng-app="trainAppli" ng-controller="trainControleur"> 
                <form method="post" action="../controllers/verification_delete_ctrl.php">
                    <p ng-repeat="trainings in trainings">
                        <table>
                            <tr>
                                <td><strong>{{trainings.start_date_train | date:'dd MMM yyyy'}} / {{trainings.end_date_train | date:'dd MMM yyyy'}}</strong></td>
                                <td><strong>{{trainings.dipl_name_train}}</strong><br>{{trainings.school_train}} à {{trainings.location_train}}<br>{{trainings.title_train}}<br><span class="diplome" value="{{trainings.dipl_validate_train}}">{{trainings.dipl_validate_train}}</span> </td>
                            </tr>
                        </table>
                        <button type="submit" name="trainings" value={{trainings.id_train}}>supprimer</button>
                        <button  name="m_trainings" id="m_trainings" value={{trainings.id_train}} >Modifier</button> 
                    </p>
                </form>
            </div> 
        </div>
        <div class="tab-pane jumbotron" id="skills">
            <form method="post" action="../controllers/verification_creation_ctrl.php">
                <div class="row">
                    <div class="form-group col-8 offset-2">
                    <!-- input caché pour avoir le name button cliqué -->
                <!--  <input type="hidden" name="skills" value="'.$data_menu['nom'].'" /> -->
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
                        <button  type="submit" name="skills"  >Ajouter</button>
                    </div>
                </div>       
            </form> 
            <h2>Compétences</h2>
            <hr>
            <div id="ng_skills" ng-app="skillsAppli" ng-controller="skillsControleur"> 
                <form method="post" action="../controllers/verification_delete_ctrl.php">
                    <p ng-repeat="skills in skills">
                        <table>
                            <tr>
                                <td><strong>{{skills.title_skill}}</strong></td>
                                <td>{{skills.desc_skill}}</td>		
                            </tr>
                        </table>
                        <button type="submit" name="skills" value={{skills.id_skill}}>supprimer</button>
                        <button  name="m_skills" id="m_skills" value={{skills.id_skill}} >Modifier</button> 
                    </p>
                </form> 
            </div>  
        </div>
        <div class="tab-pane jumbotron" id="realisations">
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
                        <button  type="submit" name="realisations" >Ajouter</button>
                    </div>
                </div>       
            </form>
            <h2>Réalisations</h2>
            <hr>
            <div id="ng_realisations" ng-app="realisationsAppli" ng-controller="realisationsControleur"> 
                <form method="post" action="../controllers/verification_delete_ctrl.php">
                    <p ng-repeat="realisations in realisations">
                        <table>
                            <tr>
                                <td><strong>{{realisations.start_date_rea  | date:'dd MMM yyyy'}} / {{realisations.end_date_rea  | date:'dd MMM yyyy'}}</strong></td>
                                <td><strong>{{realisations.title_rea}}</strong><br>{{realisations.desc_rea}}</td>
                            </tr>
                        </table>
                        <button type="submit" name="realisations" value={{realisations.id_rea}}>supprimer</button>
                        <button  name="m_realisations" id="m_realisations" value={{realisations.id_rea}} >Modifier</button> 
                    </p>
                </form> 
            </div> 
        </div>
        <div class="tab-pane jumbotron" id="activities">
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
                        <input id="desc_act" type="text" class="form-control" name="desc_act">
                    </div>
                    <div class="offset-2 col-1">
                        <button type="submit" name="activities">Ajouter</button>
                    </div>
                </div>       
            </form> 
            <h2>Activités</h2>
                <hr>
                <div id="ng_activities" ng-app="activitiesAppli" ng-controller="activitiesControleur"> 
                    <form method="post" action="../controllers/verification_delete_ctrl.php">
                        <p ng-repeat="activities in activities">
                            <table>
                                <tr>
                                    <td><strong>{{activities.title_act}}</strong></td>
                                    <td>{{activities.desc_act}}</td>		
                                </tr>
                            </table>
                            <button  type="submit" name="activities" value={{activities.id_act}}>supprimer</button>
                            <button  name="m_activities" id="m_activities" value={{activities.id_act}} >Modifier</button> 
                        </p>    
                    </form>    
                </div>
        </div>
    </div>    
    <script>  
        $('#mActivities').click(function(){ 
            $('#desc_act').attr('value','bon');
        });
        //Users
        var application = angular.module("usersAppli", []);
        application.controller("usersControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_users_mdl.php").then(function(response){
                $scope.users = response.data.users
            });
        });
        //Expérience pro
        var application1 = angular.module("expProAppli", []);
        application1.controller("expProControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_exp_pro_mdl.php").then(function(response){
                $scope.exp_pro = response.data.exp_pro
            });
        });
        angular.element(document).ready(function() {
            angular.bootstrap(document.getElementById("ng_exp_pro"), ['expProAppli']);
        });
        //trainings formation 
        var application2 = angular.module("trainAppli", []);
        application2.controller("trainControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_trainings_mdl.php").then(function(response){
                $scope.trainings = response.data.trainings
            });
        });
        angular.element(document).ready(function() {
            angular.bootstrap(document.getElementById("ng_trainings"), ['trainAppli']);
        });
        //skills  
        var application3 = angular.module("skillsAppli", []);
        application3.controller("skillsControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_skills_mdl.php").then(function(response){
                $scope.skills = response.data.skills
            });
        });
        angular.element(document).ready(function() {
            angular.bootstrap(document.getElementById("ng_skills"), ['skillsAppli']);
        });
        //realisations
        var application4 = angular.module("realisationsAppli", []);
        application4.controller("realisationsControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_realisations_mdl.php").then(function(response){
                $scope.realisations = response.data.realisations
            });
        });
        angular.element(document).ready(function() {
            angular.bootstrap(document.getElementById("ng_realisations"), ['realisationsAppli']);
        });

        //activities
        var application5 = angular.module("activitiesAppli", []);
        application5.controller("activitiesControleur", function ($scope, $http) {
            $http.get("http://localhost/curriculum/models/ng_select_activities_mdl.php").then(function(response){
                $scope.activities = response.data.activities
            });
        });
        angular.element(document).ready(function() {
            angular.bootstrap(document.getElementById("ng_activities"), ['activitiesAppli']);
        });

    </script>         
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>