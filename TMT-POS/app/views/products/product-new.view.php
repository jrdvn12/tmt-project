<?php require views_path('partials/header');?>

	<div class="container-fluid border rounded p-4 m-2 col-lg-4 mx-auto">

		<form method="post" enctype="multipart/form-data">

			<h5 class="text-primary"><i class="fa fa-hamburger"></i> Add Product</h5>

			<input name="encoder" type="hidden" value="<?php echo $_SESSION['ADMIN']['username'];?>">
			
			<div class="mb-3">
			  <label for="formFile" class="form-label">Product Image</label>
			  <input name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger':''?>" type="file" id="formFile">
			  <?php if(!empty($errors['image'])):?>
					<small class="text-danger"><?=$errors['image']?></small>
				<?php endif;?>
			</div>
			<br>
			<div class="mb-3">
			  <label for="productControlInput1" class="form-label">Product description</label>
			  <input name="description" type="text" class="form-control <?=!empty($errors['description']) ? 'border-danger':''?>" id="productControlInput1" placeholder="Product description">
			  <?php if(!empty($errors['description'])):?>
					<small class="text-danger"><?=$errors['description']?></small>
				<?php endif;?>
			</div>

			<div class="mb-3">
				<label for="Category" class="form-label">Category</label>
				<select name="category" class="form-select <?= !empty($errors['category']) ? 'border-danger' : '' ?>" id="Category">
					<option value="">Select a category</option>
					<option>School Supplies</option>
					<option>Clothing</option>
					<option>Baked Goods</option>
					<option>Beverages</option>
					<option>Canned Goods</option>
					<option>Dairy Products</option>
					<option>Desserts</option>
					<option>Detergent</option>
					<option>Frozen Foods</option>
					<option>Fruits</option>
					<option>Grains</option>
					<option>Meat & Poultry</option>
					<option>Pasta & Noodles</option>
					<option>Sauces</option>
					<option>Seafood</option>
					<option>Snacks</option>
					<option>Vegetables</option>

					<!-- Add more options as needed -->
				</select>
				<?php if (!empty($errors['category'])): ?>
					<small class="text-danger"><?= $errors['category'] ?></small>
				<?php endif; ?>
			</div>

			
			<div class="mb-3">
			  <label for="barcodeControlInput1" class="form-label">Barcode <small class="text-muted">(Optional)</small></label>
			  <input name="barcode" type="text" class="form-control <?=!empty($errors['barcode']) ? 'border-danger':''?>" id="barcodeControlInput1" placeholder="Product auto generate barcode" readonly="true">
			  <?php if(!empty($errors['barcode'])):?>
					<small class="text-danger"><?=$errors['barcode']?></small>
				<?php endif;?>
			</div>

			<div class="input-group mb-3">
			  <span class="input-group-text">Stock:</span>
			  <input name="stock" value="1" type="number" class="form-control <?=!empty($errors['stock']) ? 'border-danger':''?>" placeholder="Quantity" aria-label="Quantity">
			  <span class="input-group-text">Amount:</span>
			  <input name="amount" value="0.00" step="0.05" type="number" class="form-control <?=!empty($errors['amount']) ? 'border-danger':''?>" placeholder="Amount" aria-label="Amount">
			</div>
				<?php if(!empty($errors['Stock'])):?>
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
	</div>

<?php require views_path('partials/footer');?>