<?php $this->layout('layout', ['title' => 'Tous les termes !']) ?>

<?php $this->start('main_content') ?>
	<h2>Tous les termes.</h2>

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
					<a href="<?= $this->url('delete_terms', ['id' => $term['id']])?>" title="Effacer le terme">Effacer<i class="fa fa-trash"></i></a>
					
				</td>
			</tr>
	

<?php endforeach; ?>
		</tbody>	

	</table>
<?php $this->stop('main_content') ?>
