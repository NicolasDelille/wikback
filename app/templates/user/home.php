<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Bienvenue</h2>

	<a href="<?php echo $this->url('login')?>">Se connecter</a>

<?php $this->stop('main_content') ?>