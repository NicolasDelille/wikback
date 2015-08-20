<?php

namespace Controller;

use \W\Controller\Controller;


class UserController extends Controller
{
	public function register()
	{
		$userManager = new \Manager\UserManager();

		$usernameError ="";
		$emailError = "";
		$passwordError = "";
		
		if (!empty($_POST)) {
			// debug($_POST);
			// ninja shit
			foreach ($_POST as $k => $v) {
				$$k = trim(strip_tags($v));
			}

			$dataError = array(
				'usernameError' => $usernameError,
				'emailError' => $emailError,
				'passwordError' => $passwordError,
				);

			// validation

				// username assez long
				if (empty($username)) {
					$dataError['usernameError'] = "Veuillez indiquer un pseudo !";
				}
				

				else if (strlen($username) < 4) {
					$dataError['usernameError'] = "Nom d'utilisateur trop court !";
				}

				// email valide
				if (empty($email)) {
					$dataError['emailError'] = "Veuillez entrer une adresse email !";
				}

				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$dataError['emailError'] = "L'adresse email n'est pas valide";
				}

				// mot de passe valide
				if (empty($password)) {
					$dataError['passwordError'] = "Veuillez entrer un mot de passe !";
				}
				else if (strlen($password) <= 6) {
					$dataError['passwordError'] = "Veuillez entrer un mot de passe d'au moins 7 caractères !";
				}
				// mots de passe correspondent ?
				if ($password != $password_again) {
					$dataError['passwordError'] = "Les mots de passe que vous avez indiqué ne correspondent pas !";
				}
				
				
			// si valide ...



				if ($dataError['usernameError'] == "" && $dataError['emailError'] == "" && $dataError['passwordError'] == "") {
				
				// hacher le mot de passe
				$password_hashed =  password_hash($password, PASSWORD_DEFAULT);
				$dataValue = array(
					'username' => $username,
					'email' => $email,
					'password' => $password_hashed,
					);

				
				// insérer en bdd
					$insertSuccess = $userManager->insert($dataValue);

				// afficher bravo ou rediriger
					if ($insertSuccess) {
						$this->redirectToRoute('show_all_terms');
					}

				}
				
			// si invalide ...
				else {

				// envoyer les erreurs et les données soumises à la vue
					$dataValue = array(
					'username' => $username,
					'email' => $email,
					'password' => $password,
					'password_again' => $password_again,
					);
					
					
					$this->show('user/register_administrator', ['dataError' => $dataError, 'dataValue' => $dataValue]);
				}
		}

		$this->show('user/register_administrator');
	}
}