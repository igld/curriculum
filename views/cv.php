<?php session_start(); echo $_SESSION['id_users']; $id_users = $_SESSION['id_users']; ?>
<!doctype html>
<html lang="fr">
  <head>
    <title>CV Dynamique</title>
    <!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js'></script>  
    <link rel="stylesheet" href="style.css">
    <!-- Ajout du lien vers les fonts de caratères -->
    <link href="https://fonts.googleapis.com/css?family=Charmonman|Inconsolata|Noto+Sans" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  </head>
  <body>
	<!--CONTENEUR DE L'ENSEMBLE DE LA PAGE -->
    <div id="main-container" class="container-fluid">						
			<!-- LE HEADER QUI CONTIENT LES 3 BLOCS "ELEMENT" HAUT DE PAGE   -->
			<header class="row" ng-app="usersAppli" ng-controller="usersControleur" >
				<div class="element offset-1 col-lg-3" ng-repeat="users in users" >
					<h1>{{users.name_user}} {{users.lastname_user}}</h1>
					<hr>
					<p>
          {{users.address_user}}<br>{{users.phone_user}}<br><a href="mailto:{{users.mail_user}}">{{users.mail_user}}</a><br>{{users.date_birth_user | date:'dd MMM yyyy'}}<br>{{users.handicap_user}}<br>
					</p>
				</div>
				<div class="element offset-1 col-lg-6" ng-repeat="users in users" >
					<h1>{{users.cv_title_user}}</h1>
						<hr>
						<!-- Utilisation de la Font Charmonman style écriture à la main pour la recherche -->
					<!-- 	<p class="research-font">Je recherche un stage d'une durée 3 semaines<br> du ... au ... </p>	 -->
					<p class="research-font"><img src="images/photo-200x150.jpg" alt="my-small-picture" width="180" height="150"></p>	
					
				</div>
				<!--	<div class="element  col-lg-3">
						<figure class="displayed">
							<a href="images/photo-705x529.jpg"><img src="images/photo-200x150.jpg" alt="my-small-picture" width="200" height="150"></a>
						</figure>
          </div>
        -->  
			</header>
			<!-- LE BLOC SECTION QUI CONTIENT 2 ELEMENT LE CORPS DU CV (2 TABLEAUX : Diplômes & Formations puis Expériences professionnelles) ET LES AGILITES COTE A COTE -->
			<section class="row">
				<div class="element offset-1 col-lg-10">
          <h2>Diplômes & Formations</h2>
          <div id="trainings" ng-app="trainAppli" ng-controller="trainControleur"> 
            <hr>
            <p ng-repeat="trainings in trainings">
              <table>
                <tr>
                  <td><strong>{{trainings.start_date_train | date:'dd MMM yyyy'}} / {{trainings.end_date_train | date:'dd MMM yyyy'}}</strong></td>
                  <td><strong>{{trainings.dipl_name_train}}</strong><br>{{trainings.school_train}} à {{trainings.location_train}}<br>{{trainings.title_train}}</td>
                </tr>
              </table>
            </p>
            </div> 
          
					<h2>Expériences professionnelles</h2>
          <hr>
          <div id="exp_pro" ng-app="expProAppli" ng-controller="expProControleur"> 
					<p ng-repeat="exp_pro in exp_pro">
						<table>
							<tr>
								<td><strong>{{exp_pro.start_date_exp  | date:'dd MMM yyyy'}} / {{exp_pro.end_date_exp  | date:'dd MMM yyyy'}}</strong></td>
								<td><strong>{{exp_pro.job_exp}}</strong> ({{exp_pro.type_contract_exp}})<br>{{exp_pro.firm_name_exp}} à {{exp_pro.location_exp}}.<br>{{exp_pro.mission_exp}}</td>
							
							</tr>
						</table>
          </p> 
          </div>  
          
          <h2>Compétences</h2>
          <hr>
          <div id="skills" ng-app="skillsAppli" ng-controller="skillsControleur"> 
					<p ng-repeat="skills in skills">
						<table>
							<tr>
								<td><strong>{{skills.title_skill}}</strong></td>
								<td>{{skills.desc_skill}}</td>		
							</tr>
						</table>
          </p> 
          </div>  
          
          <h2>Réalisations</h2>
          <hr>
          <div id="realisations" ng-app="realisationsAppli" ng-controller="realisationsControleur"> 
					<p ng-repeat="realisations in realisations">
						<table>
							<tr>
              <td><strong>{{realisations.start_date_rea  | date:'dd MMM yyyy'}} / {{realisations.end_date_rea  | date:'dd MMM yyyy'}}</strong></td>
							<td><strong>{{realisations.title_rea}}</strong><br>{{realisations.desc_rea}}</td>
							</tr>
						</table>
          </p> 
          </div> 
          
          <h2>Activités</h2>
          <hr>
          <div id="activities" ng-app="activitiesAppli" ng-controller="activitiesControleur"> 
					<p ng-repeat="activities in activities">
						<table>
							<tr>
								<td><strong>{{activities.title_act}}</strong></td>
								<td>{{activities.desc_act}}</td>		
							</tr>
						</table>
          </p> 
          </div>  

				</div>
			
			</section>	
		</div>				



		<script>
			var application = angular.module("usersAppli", []);
	
			application.controller("usersControleur", function ($scope, $http) {
			$http.get("http://localhost/curriculum/models/ng_select_users_mdl.php").then(function(response){
					$scope.users = response.data.users
			});
			});
			// EXPLICATIONS: $http est un service natif qui émet une requête au serveur externe et récupère la réponse
			
			var application1 = angular.module("expProAppli", []);
	
			application1.controller("expProControleur", function ($scope, $http) {
			$http.get("http://localhost/curriculum/models/ng_select_exp_pro_mdl.php").then(function(response){
					$scope.exp_pro = response.data.exp_pro
			});
			});
			
			angular.element(document).ready(function() {
				angular.bootstrap(document.getElementById("exp_pro"), ['expProAppli']);
	});
			// EXPLICATIONS: $http est un service natif qui émet une requête au serveur externe et récupère la réponse
		
  var application2 = angular.module("trainAppli", []);
  application2.controller("trainControleur", function ($scope, $http) {
  $http.get("http://localhost/curriculum/models/ng_select_trainings_mdl.php").then(function(response){
      $scope.trainings = response.data.trainings
  });
  });
  
  angular.element(document).ready(function() {
    angular.bootstrap(document.getElementById("trainings"), ['trainAppli']);
});
  //skills  
  var application3 = angular.module("skillsAppli", []);
  application3.controller("skillsControleur", function ($scope, $http) {
  $http.get("http://localhost/curriculum/models/ng_select_skills_mdl.php").then(function(response){
      $scope.skills = response.data.skills
  });
  });
  
  angular.element(document).ready(function() {
    angular.bootstrap(document.getElementById("skills"), ['skillsAppli']);
});

//realisations
var application4 = angular.module("realisationsAppli", []);
  application4.controller("realisationsControleur", function ($scope, $http) {
  $http.get("http://localhost/curriculum/models/ng_select_realisations_mdl.php").then(function(response){
      $scope.realisations = response.data.realisations
  });
  });
  
  angular.element(document).ready(function() {
    angular.bootstrap(document.getElementById("realisations"), ['realisationsAppli']);
});

//activities
var application5 = angular.module("activitiesAppli", []);
  application5.controller("activitiesControleur", function ($scope, $http) {
  $http.get("http://localhost/curriculum/models/ng_select_activities_mdl.php").then(function(response){
      $scope.activities = response.data.activities
  });
  });
  
  angular.element(document).ready(function() {
    angular.bootstrap(document.getElementById("activities"), ['activitiesAppli']);
});
   
    
    
    </script>      

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  </body>
</html>
