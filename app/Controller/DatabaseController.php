<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use \Manager\UserManager;
use \Manager\DatabaseManager;


class DatabaseController extends Controller
{
	public function export()
	{
		$databaseManager = new DatabaseManager();
		$tables = ['users','categories','definitions','examples','terms'];

		$table = $databaseManager->findAllTables($tables);
		
		$this->showJson($table);
	}
}
	