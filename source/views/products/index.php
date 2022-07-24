   <?php include(__DIR__ . '/../layouts/header.php'); ?>
   <!-- Main Content -->
   <div class="header-list-page">
     <h1 class="title">Products </h1>
     <a href="/products/create" class="btn-action">Add new Product</a>
   </div>
   <table class="data-grid">
     <tr class="data-row">
       <th class="data-grid-th">
         <span class="data-grid-cell-content">Name</span>
       </th>
       <th class="data-grid-th">
         <span class="data-grid-cell-content">SKU</span>
       </th>
       <th class="data-grid-th">
         <span class="data-grid-cell-content">Price</span>
       </th>
       <th class="data-grid-th">
         <span class="data-grid-cell-content">Quantity</span>
       </th>
       <th class="data-grid-th">
         <span class="data-grid-cell-content">Categories Code</span>
       </th>

       <th class="data-grid-th">
         <span class="data-grid-cell-content">Actions</span>
       </th>
     </tr>
     <?php foreach ($data['products'] as $item) { ?>
       <tr class="data-row">
         <td class="data-grid-td">
           <span class="data-grid-cell-content"><?= $item->name ?></span>
         </td>

         <td class="data-grid-td">
           <span class="data-grid-cell-content"><?= $item->sku ?></span>
         </td>

         <td class="data-grid-td">
           <span class="data-grid-cell-content"><?= $item->price ?></span>
         </td>

         <td class="data-grid-td">
           <span class="data-grid-cell-content"><?= $item->quantity ?></span>
         </td>

         <td class="data-grid-td">
           <span class="data-grid-cell-content"> <?= $item->category_id ?> </span>
         </td>
         <td class="data-grid-td">
           <div class="actions">
             <div class="action edit">
               <a href="<?= 'products/edit?id=' . $item->id ?>">
                 <span>
                   Edit
                 </span>
               </a>
             </div>
             <div style="margin-left:5px;" class="action delete">
               <a href="<?= 'products/delete?id=' . $item->id ?>">
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
