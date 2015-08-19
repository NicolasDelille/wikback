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

}