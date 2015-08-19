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
		$terms = $termManager->findAll();

		// debug($terms);

		$this->show('term/show_all_terms', ['terms' => $terms]);
	}

}