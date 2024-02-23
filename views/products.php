
<?php 
$sql = "select * from products order by id desc";
$result = $GLOBALS['conn']->query($sql);
$products = mysqli_fetch_all($result,MYSQLI_ASSOC);


?>

<div class="app-content-header">

  <h1 class="app-content-headerText">المنتجات</h1>
  <button class="mode-switch" title="Switch Theme">
    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
      <defs></defs>
      <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
    </svg>
  </button>
  <a href="home.php?action=create_product" class="app-content-headerButton">إضافة منتج جديد</a>
</div>
<br>
<br>
<div class="products-area-wrapper tableView">


<table class="product-table">
  <thead>
    <tr>
      <th>الكود</th>
      <th>الاسم</th>
      <th>الوصف</th>
      <th>السعر</th>
      <th>الكمية</th>
      <th>الإجمالي</th>
      <th>الإنشاء</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($products as $product){
      ?>
      
      <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['description']; ?></td>
        <td><?php echo $product['price']; ?> د.ل</td>
        <td><?php echo $product['qty']; ?></td>
        <td><?php echo ($product['qty'] * $product['price']); ?> د.ل</td>
        <td><?php echo $product['created_at']; ?></td>
      </tr>

      <?php 
    } ?>
  </tbody>
</table>
</div>