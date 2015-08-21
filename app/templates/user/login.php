<?php $this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
	<h2>Connexion</h2>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Entrez un pseudo</label>
			<input type="text" name="username" placeholder="Pseudo" value="<?= (!empty($_POST) ? $username : "") ?>">
			<?=(!empty($_POST) ? '<p class="text-error">' . $usernameError . '</p>' : "")?>
		</div>
			
		
		<div class="form-group">
			<label for="password">Entrez votre mot de passe</label>
			<input type="password" name="password" placeholder="Mot de passe"> 
			<?=(!empty($_POST) ? '<p class="text-error">' . $passwordError . '</p>' : "")?>
		</div>

		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Connexion"> 
			<a class="btn btn-danger" href="<?php echo $this->url('home')?>">Retour à l'accueil</a>
		</div>
			
	</form>

<?php $this->stop('main_content') ?>