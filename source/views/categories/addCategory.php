   <?php include(__DIR__ . '/../layouts/header.php'); ?>
 <!-- Main Content -->
    <h1 class="title new-item">New Category</h1>

    <form action="/categories" method="POST" enctype="">
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input required type="text" name="name" id="category-name" class="input-text" />

      </div>
      <div class="input-field">
        <input type="hidden" name="id" id="category-code" class="input-text" />
      </div>
      <div class="actions-form">
        <a href="/categories" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  <!-- Main Content -->
<?php include(__DIR__ . '/../layouts/footer.php'); ?>
