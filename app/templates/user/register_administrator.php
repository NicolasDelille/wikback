<?php $this->layout('layout', ['title' => 'Création de compte']) ?>

<?php $this->start('main_content') ?>
	<h2>Créer un nouveau compte</h2>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Entrez un pseudo</label>
			<input type="text" name="username" placeholder="Pseudo" value="<?= (!empty($_POST) ? $username : "") ?>">
			<?=(!empty($_POST) ? '<p class="text-error">' . $usernameError . '</p>' : "")?>
		</div>
		
		<div class="form-group">
			<label for="email">Entrez un email valide</label>
			<input type="email" name="email" placeholder="Email" value="<?= (!empty($_POST) ? $email : "") ?>">
			<?=(!empty($_POST) ? '<p class="text-error">' . $emailError . '</p>' : "")?>
		</div>
			
		<div class="form-group">
			<label for="password">Entrez un mot de passe</label>
			<input type="password" name="password" placeholder="Mot de passe">
			<?=(!empty($_POST) ? '<p class="text-error">' . $passwordError . '</p>' : "")?>
		</div>
			
		<div class="form-group">
			<label for="password">Confirmer le mot de passe</label>
			<input type="password" name="password_again"placeholder="Mot de passe encore">
		</div>
			
		<div class="form-group">
			<input class="btn btn-success" type="submit" value="Enregistrer">
			<a class="btn btn-danger" href="<?= $this->url('show_all_terms') ?>" title="Revenir en arrière">Revenir en arrière</a>
		</div>
			
	</form>



	
<?php $this->stop('main_content') ?>
