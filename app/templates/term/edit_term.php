<?php $this->layout('layout', ['title' => 'Modification']) ?>

<?php $this->start('main_content') ?>

<h2><?= $this->e($term['name'])?></h2>

<form method="POST">
	<div class="form-group">
		<label for="slug">Le slug</label>
		<input name="slug"type="text" value="<?= $this->e($term['slug'])?>">
	</div>

	<div class="form-group">
		<label for="name">Le terme</label>
		<input name="name"type="text" value="<?= $this->e($term['name'])?>">
	</div>

	<div class="form-group">
		<label for="variations">Les variations</label>
		<input name="variations"type="text" value="<?= $this->e($term['variations'])?>">
	</div>

	<div class="form-group">
		<label for="pronunciation">La prononciation</label>
		<input name="pronunciation"type="text" value="<?= $this->e($term['pronunciation'])?>">
	</div>

	<div class="form-group">
		<label for="nature">La nature</label>
		<input name="nature"type="text" value="<?= $this->e($term['nature'])?>">
	</div>

	<div class="form-group">
		<label for="gender">Le genre</label>
		<input name="gender"type="text" value="<?= $this->e($term['gender'])?>">
	</div>

	<div class="form-group">
		<label for="number">Le nombre</label>
		<input name="number"type="text" value="<?= $this->e($term['number'])?>">
	</div>

	<div class="form-group">
		<label for="origin">L'origine</label>
		<input name="origin"type="text" value="<?= $this->e($term['origin'])?>">
	</div>

	<div class="form-group">
		<input type="submit" value="Modifier" class="btn btn-default">
	</div>

</form>


<?php $this->stop('main_content') ?>