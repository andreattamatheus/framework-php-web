<?php include(__DIR__ . '/../layouts/header.php'); ?>
 <!-- Main Content -->
    <h1 class="title new-item">New Category</h1>

    <form action="/categories/update" method="POST" enctype="">
      <input required type="hidden" name="id" id="category-name" class="input-text" value="<?= $data['category']['id'] ?>"  />

      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input required type="text" name="name" id="category-name" class="input-text" value="<?= $data['category']['name'] ?>"  />
      </div>
      <div class="actions-form">
        <a href="/categories" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Update" />
      </div>
    </form>
  <!-- Main Content -->
<?php include(__DIR__ . '/../layouts/footer.php'); ?>
