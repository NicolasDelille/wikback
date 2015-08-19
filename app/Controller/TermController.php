<?php

namespace Controller;

use \W\Controller\Controller;


class TermController extends Controller
{

	/**
	 * Affiche tous les termes
	 */
	public function showAll()
	{
		$termManager = new \Manager\TermManager();
		// debug(get_class_methods($termManager));
		$terms = $termManager->findAll("modifiedDate", "DESC");

		// debug($terms);

		$this->show('term/show_all_terms', ['terms' => $terms]);
	}

	public function delete($id)
	{
		$termManager = new \Manager\TermManager();
		$termManager->delete($id);

		$this->redirectToRoute("show_all_terms");

	}

	public function edit($id)
	{
		// récupérer en bdd le terme à modifier
		$termManager = new \Manager\TermManager();
		
		//si le formulaire est soumis...
		if (!empty($_POST)) {
		// valider
			$slug = trim($_POST['slug']);
			$name = trim($_POST['name']);
			$variations = trim($_POST['variations']);
			$pronunciation = trim($_POST['pronunciation']);
			$nature = trim($_POST['nature']);
			$number = trim($_POST['number']);
			$origin = trim($_POST['origin']);
			

			if (strlen($name) > 1)  {
				$data = array(
					"slug" => $slug,
					"name" => $name,
					"variations" => $variations,
					"pronunciation" => $pronunciation,
					"nature" => $nature,
					"gender" => $gender,
					"number" => $number,
					"origin" => $origin,
					"modifiedDate" => date("Y-m-d H:i:s")
					);

		// sauvegarder les modifications avec ->udpdate()
				$termManager->update($data, $id);
				$this->redirectToRoute("show_all_terms");
			}
		}
		$term = $termManager->find("$id");
		debug($term);
		//passer le terme à la vue
		$this->show('term/edit_term', ['term' => $term]);
	}

}