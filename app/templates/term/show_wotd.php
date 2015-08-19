<?php $this->layout('layout', ['title' => 'Le mot du jour!']) ?>

<?php $this->start('main_content') ?>
	<div>
		<p>Le mot du jour est : <?= $this->e($wotd['name'])?></p>
		<a class="btn btn-info" href="<?= $this->url('change_wotd') ?>" title="Changer le mot du jour">Changer le mot du jour</a>
		<a class="btn btn-danger" href="<?= $this->url('show_all_terms') ?>" title="Revenir en arrière">Revenir en arrière</a>

	</div>

<?php $this->stop('main_content') ?>