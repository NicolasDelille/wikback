<?php

namespace Manager;
use \W\Manager\Manager;

class DatabaseManager extends \W\Manager\Manager

{
	public function findAllTables($tables)
	{
		// Récupérer toutes les tables de la base de données
		
		for ($i=0 , $c = count($tables); $i < $c; $i++) { 
			$this->setTable($tables[$i]);
			$table[$tables[$i]] = $this->findAll();
		}
		return $table;
	}
}
		
