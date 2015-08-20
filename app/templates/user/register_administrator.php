<?php $this->layout('layout', ['title' => 'Création de compte']) ?>

<?php $this->start('main_content') ?>
	<h2>Créer un nouveau compte</h2>

	<form action="" method="POST">
		<div class="form-group">
			<label for="username">Entrez un pseudo</label>
			<input type="text" name="username" placeholder="Pseudo" 
			<?php 
				if (!empty($dataValue['username'])) {
					echo 'value = "' . $dataValue['username'] . '"';
				}
			?>
			> 
			<?php
			if (!empty($dataError['usernameError'])) {
				echo '<p class="text-error">'.$dataError['usernameError'].'</p>';
			}
			?>
		</div>
		
		<div class="form-group">
			<label for="email">Entrez un email valide</label>
			<input type="email" name="email" placeholder="Email"
			<?php 
				if (!empty($dataValue['email'])) {
					echo 'value = "' . $dataValue['email'] . '"';
				}
			?>
			> 
			<?php
			if (!empty($dataError['emailError'])) {
				echo '<p class="text-error">'.$dataError['emailError'].'</p>';
			}
			?>
		</div>
			
		<div class="form-group">
			<label for="password">Entrez un mot de passe</label>
			<input type="password" name="password" placeholder="Mot de passe">
			<?php
			if (!empty($dataError['passwordError'])) {
				echo '<p class="text-error">'.$dataError['passwordError'].'</p>';
			}
			?>
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
