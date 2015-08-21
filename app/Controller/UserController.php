<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \Manager\UserManager;

class UserController extends Controller
{
	public function home()
	{
		$userManager = new UserManager();

		$this->show('user/home');
	}

	public function login()
	{
		$authentificationManager = new AuthentificationManager();
		$userManager = new UserManager();
		$username = "";
		$password = "";
		$usernameError = "";
		$passwordError = "";

		if (!empty($_POST)) {

			foreach ($_POST as $k => $v) {
				$$k = trim(strip_tags($v));
			}

			// Validation des données
			if (empty($username)) {
				$usernameError = "Veuillez indiquer un pseudo !";
			}
			
			if (empty($password)) {
					$passwordError = "Veuillez entrer un mot de passe !";
			}
				
			if ($usernameError == "" && $passwordError == "") {
			
				$id = $authentificationManager->isValidLoginInfo($username,$password);

				if ($id) {
					// Récupération des infos de l'utilisateur
					$user = $userManager->find($id);

					// Attribution des infos de l'utilisateur à la session
					$authentificationManager->logUserIn($user);

					$this->redirectToRoute('show_all_terms');
				}
				else {
					$usernameError = "Mauvais identifiants !";
				}

			}

			$dataToPassToTheView = [
				'username' => $username,
				'usernameError' => $usernameError,
				'passwordError' => $passwordError,
			];

			$this->show('user/login', $dataToPassToTheView);


		}

		$this->show('user/login');
	}
	public function logout()
	{
		$authentificationManager = new AuthentificationManager();
		$userManager = new UserManager();
		$authentificationManager->logUserOut($w_user);

		$this->redirectToRoute('login');

	}
	public function register()
	{
		$this->allowTo('admin');
		$userManager = new UserManager();

		$usernameError ="";
		$emailError = "";
		$passwordError = "";
		
		if (!empty($_POST)) {
			
			foreach ($_POST as $k => $v) {
				$$k = trim(strip_tags($v));
			}

			// validation

				// username assez long
				if (empty($username)) {
					$usernameError = "Veuillez indiquer un pseudo !";
				}
				

				else if (strlen($username) < 4) {
					$usernameError = "Nom d'utilisateur trop court !";
				}

				// username déjà présent bdd
				else if ($userManager->usernameExists($username)) {
					$usernameError = "Ce pseudo est déjà utilisé !";
				}

				// email valide
				if (empty($email)) {
					$emailError = "Veuillez entrer une adresse email !";
				}

				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailError = "L'adresse email n'est pas valide";
				}

				// email déjà présent en bdd
				else if ($userManager->emailExists($email)) {
					$emailError = "Cet adresse email est déjà utilisée !";
				}

				// mot de passe valide
				if (empty($password)) {
					$passwordError = "Veuillez entrer un mot de passe !";
				}
				else if (strlen($password) <= 6) {
					$passwordError = "Veuillez entrer un mot de passe d'au moins 7 caractères !";
				}
				// mots de passe correspondent ?
				if ($password != $password_again) {
					$passwordError = "Les mots de passe que vous avez indiqué ne correspondent pas !";
				}
				
				
			// si valide ...



				if ($usernameError == "" && $emailError == "" && $passwordError == "") {
				
				// hacher le mot de passe
					$password_hashed =  password_hash($password, PASSWORD_DEFAULT);
					$newAdmin = [
						'username' => $username,
						'email' => $email,
						'password' => $password_hashed,
						'role' => 'admin',
						'date_created' => date('Y-m-d H:i:s'),
						'date_modified' => date('Y-m-d H:i:s'),
						];

				// insérer en bdd
						$insertSuccess = $userManager->insert($newAdmin);

				// afficher bravo ou rediriger
						if ($insertSuccess) {
							$this->redirectToRoute('show_all_terms');
						}

				}
				
			// si invalide ...
				else {

				// envoyer les erreurs et les données soumises à la vue
					$dataToPassToTheView = [
					'username' => $username,
					'email' => $email,
					'usernameError' => $usernameError,
					'emailError' => $emailError,
					'passwordError' => $passwordError
					];
					
					
					$this->show('user/register_administrator', $dataToPassToTheView);
				}
		}

		$this->show('user/register_administrator');
	}
}