<?php include(__DIR__ . '/../layouts/header.php'); ?>
<!-- Main Content -->
<div class="header-list-page">
  <h1 class="title">Categories</h1>
  <a href="/categories/create" class="btn-action">Add new Category</a>
</div>
<table class="data-grid">
  <tr class="data-row">
    <th class="data-grid-th">
      <span class="data-grid-cell-content">Name</span>
    </th>
    <th class="data-grid-th">
      <span class="data-grid-cell-content">Code</span>
    </th>
    <th class="data-grid-th">
      <span class="data-grid-cell-content">Actions</span>
    </th>
  </tr>

  <?php foreach ($data['categories'] as $item) { ?>
    <tr class="data-row">
      <td class="data-grid-td">
        <span class="data-grid-cell-content"><?= $item->name ?></span>
      </td>

      <td class="data-grid-td">
        <span class="data-grid-cell-content"><?= $item->id ?></span>
      </td>

      <td class="data-grid-td">
        <div class="actions">
          <div class="action edit">
            <a href="<?= 'categories/edit?id=' . $item->id ?>">
              <span>
                Edit
              </span>
            </a>
          </div>
          <div class="action delete">
            <a href="<?= 'categories/delete?id=' . $item->id ?>">
              <span>
                Delete
              </span>
            </a>
          </div>
        </div>
      </td>
    </tr>

  <?php } ?>
</table>
<!-- Main Content -->
<?php include(__DIR__ . '/../layouts/footer.php'); ?>
