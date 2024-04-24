<?php require views_path('partials/header');?>

	<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

		<?php if(!empty($row)):?>

		<form method="post" enctype="multipart/form-data">

			<h5 class="text-primary"><i class="fa fa-hamburger"></i> Edit Product</h5>
		
			<div class="mb-3">
			  <label for="formFile" class="form-label">Product Image</label>
			  <input name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger':''?>" type="file" id="formFile">
			  <?php if(!empty($errors['image'])):?>
					<small class="text-danger"><?=$errors['image']?></small>
				<?php endif;?>
			</div>
			<img class="mx-auto d-block" src="<?=$row['image']?>" style="width:80%;">
			<br>
			<div class="mb-3">
			  <label for="productControlInput1" class="form-label">Product description</label>
			  <input value="<?=set_value('description',$row['description'])?>" name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger':''?>" id="productControlInput1" placeholder="Product description">
			  <?php if(!empty($errors['description'])):?>
					<small class="text-danger"><?=$errors['description']?></small>
				<?php endif;?>
			</div>

			<div class="mb-3">
			<label for="Category" class="form-label">Category</label>
			<select name="category" class="form-select <?= !empty($errors['category']) ? 'border-danger' : '' ?>" id="Category">
				<option value="">Select a category</option>
				<option <?= ($row['category'] == 'School Supplies') ? 'selected' : '' ?>>School Supplies</option>
				<option <?= ($row['category'] == 'Clothing') ? 'selected' : '' ?>>Clothing</option>
				<option <?= ($row['category'] == 'Baked Goods') ? 'selected' : '' ?>>Baked Goods</option>
				<option <?= ($row['category'] == 'Beverages') ? 'selected' : '' ?>>Beverages</option>
				<option <?= ($row['category'] == 'Canned Goods') ? 'selected' : '' ?>>Canned Goods</option>
				<option <?= ($row['category'] == 'Dairy Products') ? 'selected' : '' ?>>Dairy Products</option>
				<option <?= ($row['category'] == 'Desserts') ? 'selected' : '' ?>>Desserts</option>
				<option <?= ($row['category'] == 'Detergent') ? 'selected' : '' ?>>Detergent</option>
				<option <?= ($row['category'] == 'Frozen Foods') ? 'selected' : '' ?>>Frozen Foods</option>
				<option <?= ($row['category'] == 'Fruits') ? 'selected' : '' ?>>Fruits</option>
				<option <?= ($row['category'] == 'Grains') ? 'selected' : '' ?>>Grains</option>
				<option <?= ($row['category'] == 'Meat & Poultry') ? 'selected' : '' ?>>Meat & Poultry</option>
				<option <?= ($row['category'] == 'Pasta & Noodles') ? 'selected' : '' ?>>Pasta & Noodles</option>
				<option <?= ($row['category'] == 'Seafood') ? 'selected' : '' ?>>Seafood</option>
				<option <?= ($row['category'] == 'Snacks') ? 'selected' : '' ?>>Snacks</option>
				<option <?= ($row['category'] == 'Sauces') ? 'selected' : '' ?>>Sauces</option>
				<option <?= ($row['category'] == 'Vegetables') ? 'selected' : '' ?>>Vegetables</option>
				<!-- Add more categories as needed -->
			</select>
			<?php if (!empty($errors['category'])): ?>
				<small class="text-danger"><?= $errors['category'] ?></small>
			<?php endif; ?>
		</div>


			
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(optional)</small></label>
			  <input value="<?=set_value('barcode',$row['barcode'])?>" name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Product barcode" readonly="true">
			  <?php if(!empty($errors['barcode'])):?>
					<small class="text-danger"><?=$errors['barcode']?></small>
				<?php endif;?>
			</div>

			<div class="input-group mb-3">
			  <span class="input-group-text">Stock:</span>
			  <input name="stock" value="<?=set_value('stock',$row['stock'])?>" type="number" class="form-control <?=!empty($errors['stock']) ? 'border-danger':''?>" placeholder="Quantity" aria-label="Quantity">
			  <span class="input-group-text">Amount:</span>
			  <input name="amount" value="<?=set_value('amount',$row['amount'])?>" step="0.05" type="number" class="form-control <?=!empty($errors['amount']) ? 'border-danger':''?>" placeholder="Amount" aria-label="Amount">
			</div>
				<?php if(!empty($errors['stock'])):?>
					<small class="text-danger"><?=$errors['stock']?></small>
				<?php endif;?>
				<?php if(!empty($errors['amount'])):?>
					<small class="text-danger"><?=$errors['amount']?></small>
				<?php endif;?>
				<br>
			
			<button class="btn btn-danger float-end">Save</button>
			<a href="index.php?pg=admin&tab=products">
				<button type="button" class="btn btn-primary">Cancel</button>
			</a>
		</form>
		<?php else:?>
			That product was not found
			<br><br>
			<a href="index.php?pg=admin&tab=products">
				<button type="button" class="btn btn-primary">Back to products</button>
			</a>

		<?php endif;?>

	</div>

<?php require views_path('partials/footer');?>