<?php $this->layout('layout', ['title' => 'Tous les termes !']) ?>

<?php $this->start('main_content') ?>

	<div class="row-fluid">
		<div class="span8">
			<div class="span6">
				<p class="lead">Bienvenue <?= $w_user['username']?> !</p>
			</div>
		</div>
		<div class="span4">
			<div class="span1">
				<a class="btn btn-mini btn-danger" href="<?= $this->url('logout', ['id' => $w_user['id']])?>" title="Déconnexion">Se déconnecter</a>
			</div>
		</div>
	</div>
	
	<div class="row-fluid">
		<div class="span6">
			<a href="<?= $this->url('show_wotd') ?>" title="Voir le mot du jour">Voir le mot du jour</a>
			<a href="<?= $this->url('register_administrator')?>">Ajouter un administrateur</a>
		</div>
	</div>
	
	<h2>Liste des termes</h2>

	<div class="span12">
		
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Date de modification</th>
				<th>Actions</th>

			</tr>
		</thead>
		<tbody>

	<?php foreach ($terms as $term): ?>
			<tr>
				<td><?= $term['id'] ?></td>
				<td><?= $this->e($term['name']) ?></td>
				<td><?= $this->e($term['modifiedDate']) ?></td>
				<td>
					<a href="<?= $this->url('delete_terms', ['id' => $term['id']])?>" title="Effacer ce terme">Effacer<i class="fa fa-trash"></i></a>
					<a href="<?= $this->url('edit_term', ['id' => $term['id']])?>" title="Modifier ce terme">Modifier<i class="fa fa-pencil"></i></a>
				</td>
			</tr>
	

<?php endforeach; ?>
		</tbody>	

	</table>
	</div>
<?php $this->stop('main_content') ?>
