<?php
	
	$w_routes = array(
		['GET', '/', 'User#home', 'home'],
		['GET|POST', '/admin/connexion/', 'User#login', 'login'],
		['GET', '/admin/deconnexion/', 'User#logout', 'logout'],

		['GET', '/admin/termes/', 'Term#showAll', 'show_all_terms'],
		['GET', '/admin/termes/suppression/[i:id]/', 'Term#delete', 'delete_terms'],
		['GET|POST', '/admin/termes/modification/[i:id]/', 'Term#edit', 'edit_term'],
		['GET', '/admin/termes/changer-mdj/', 'Term#changeWotd', 'change_wotd'],
		['GET', '/admin/termes/montrer-mdj/', 'Term#showWotd', 'show_wotd'],
		['GET|POST', '/admin/administrateurs/inscription/', 'User#register', 'register_administrator'],
		['GET|POST', '/admin/administrateurs/export/', 'Database#export', 'export_database'],
	);
		