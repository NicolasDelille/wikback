<?php $this->layout('layout', ['title' => 'Modification']) ?>

<?php $this->start('main_content') ?>

<h2><?= $this->e($term['name'])?></h2>

<form method="POST" class="form-horizontal">
	<div class="form-group">
		<label for="slug">Le slug</label>
		<input class="form-control" name="slug"type="text" value="<?= $this->e($term['slug'])?>">
	</div>

	<div class="form-group">
		<label for="name">Le terme</label>
		<input class="form-control" name="name"type="text" value="<?= $this->e($term['name'])?>">
	</div>

	<div class="form-group">
		<label for="variations">Les variations</label>
		<input class="form-control" name="variations"type="text" value="<?= $this->e($term['variations'])?>">
	</div>

	<div class="form-group">
		<label for="pronunciation">La prononciation</label>
		<input class="form-control" name="pronunciation"type="text" value="<?= $this->e($term['pronunciation'])?>">
	</div>

	<div class="form-group">
		<label for="nature">La nature</label>
		<input class="form-control" name="nature"type="text" value="<?= $this->e($term['nature'])?>">
	</div>

	<div class="form-group">
		<label for="gender">Le genre</label>
		<input class="form-control" name="gender"type="text" value="<?= $this->e($term['gender'])?>">
	</div>

	<div class="form-group">
		<label for="number">Le nombre</label>
		<input class="form-control" name="number"type="text" value="<?= $this->e($term['number'])?>">
	</div>

	<div class="form-group">
		<label for="origin">L'origine</label>
		<input class="form-control" name="origin"type="text" value="<?= $this->e($term['origin'])?>">
	</div>

	<input type="submit" value="Modifier" class="btn btn-warning">
	<a class="btn btn-danger" href="<?= $this->url('show_all_terms') ?>" title="Retour à la page précédente">Retour</a>
	
</form>



<?php $this->stop('main_content') ?>