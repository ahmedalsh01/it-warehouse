
<?php 
$sql = "select * from users order by id desc";
$result = $GLOBALS['conn']->query($sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);



?>

<div class="app-content-header">

  <h1 class="app-content-headerText">المستخدمين</h1>
  <button class="mode-switch" title="Switch Theme">
    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
      <defs></defs>
      <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
    </svg>
  </button>
  <a href="home.php?action=create_user" class="app-content-headerButton">إضافة مستخدم جديد</a>
</div>
<br>
<br>
<div class="products-area-wrapper tableView">


<table class="product-table">
  <thead>
    <tr>
      <th>الكود</th>
      <th>الاسم</th>
      <th>البريد الإلكتروني</th>
      <th>اخر دخول</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($users as $user){
      ?>
      
      <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['last_login_at']; ?></td>
      </tr>

      <?php 
    } ?>
  </tbody>
</table>
</div>