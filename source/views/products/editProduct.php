<?php include(__DIR__ . '/../layouts/header.php'); ?>
 <!-- Main Content -->
    <h1 class="title new-item">Edit Product</h1>

    <form action="/products/update" method="POST" enctype="">
      <div class="input-field">
        <input hidden type="text" id="id"  name="id"  value="<?= $data['product']['id'] ?>" class="input-text" />
      </div>
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input required type="text" id="sku"  name="sku"  value="<?= $data['product']['sku'] ?>" class="input-text" />
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input required type="text" id="name"  name="name" value="<?= $data['product']['name'] ?>" class="input-text" />
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input required type="text" id="price"  name="price"  value="<?= $data['product']['price'] ?>" class="input-text" />
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input required type="text" id="quantity"  name="quantity"  value="<?= $data['product']['quantity'] ?>" class="input-text" />
      </div>
      <div class="input-field">
        <label for="category_id" class="label">Categories</label>
        <select required multiple id="category_id"  name="category_id" class="input-text">
          <?php foreach ($data['categories'] as $item) { ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea required id="description"  name="description" class="input-text"><?= $data['product']['description'] ?></textarea>
      </div>
      <div class="actions-form">
        <a href="/products" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>

    </form>
  <!-- Main Content -->
<?php include(__DIR__ . '/../layouts/footer.php'); ?>
