<div class="table-responsive">
	<table class="table table-striped table-hover">
		<tr>
			<th>Image</th><th>Username</th><th>Gender</th><th>Email</th><th>Role</th><th>Date</th>
			<th>
				<a href="index.php?pg=signup">
					<button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
				</a>
			</th>
		</tr>

		<?php if (!empty($admin)):?>
			<?php foreach ($admin as $admin):?>
	 		<tr>
				<td>
					<a href="index.php?pg=profile&id=<?=$admin['id']?>">
					<img src="<?=crop($admin['image'],400,$admin['gender'])?>" style="width: 100%;max-width:100px;" >
					</a>
				</td>

				<td>
					<a href="index.php?pg=profile&id=<?=$admin['id']?>">
						<?=esc($admin['username'])?>
					</a>	
				</td>
				<td><?=esc($admin['gender'])?></td>
				<td><?=esc($admin['email'])?></td>
				<td><?=esc($admin['role'])?></td>
				
				<td><?=date("jS M, Y",strtotime($admin['date']))?></td>
				<td>
					<a href="index.php?pg=edit-user&id=<?=$admin['id']?>">
						<button class="btn btn-success btn-sm">Edit</button>
					</a>
					<a href="index.php?pg=delete-user&id=<?=$admin['id']?>">
						<button class="btn btn-danger btn-sm">Delete</button>
					</a>
				</td>
			</tr>
			<?php endforeach;?>
		<?php endif;?>
		
	</table>

	<?php 
	$pager->display($totalAdmin)?>
</div>