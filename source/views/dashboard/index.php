<?php include(__DIR__ . '/../layouts/header.php'); ?>

<div class="header-list-page">
  <h1 class="title">Dashboard</h1>
</div>
<div class="infor">
  You have <?= count($data['products']) ?> products added on this store: <a href="/products/create" class="btn-action">Add new Product</a>
</div>
<ul class="product-list">
  <?php foreach ($data['products'] as $item) { ?>

    <li>
      <div class="product-image">
        <img src="<?= $item->image_path ?>" layout="responsive" width="164" height="145" alt="<?= $item->name ?>" />
      </div>
      <div class="product-info">
        <div class="product-name">
          <span>
            <a href="<?= 'products/edit?id=' . $item->id ?>"><?= $item->name ?></a>
          </span>
        </div>


        <div class="product-price"><span class="special-price">Out of stock</span> <span>R$<?= $item->price ?></span></div>
      </div>
    </li>
  <?php } ?>
</ul>

<div class="infor">
  <br>
  <br>
  <br>
</div>

<div class="infor ">
  <!-- Run your database SQL: <a href="/database-run" class="btn-action">Run SQL Statement</a> -->
</div>

<?php include(__DIR__ . '/../layouts/footer.php'); ?>
