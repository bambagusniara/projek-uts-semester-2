<?php
include_once 'top.php';
include_once 'menu.php';

?>
 <div id="layoutSidenav_content">
    <main>
<div class="container-fluid px-4">
<h1>Selamat datang dihalaman admin</h1>

<?php
error_reporting(0);
$hal = $_GET['hal'];
if($hal == 'list_order.php'){
  include_once 'list_order.php';
} else if( !empty($hal)){
  include_once '' .$hal.'.php';
} else {
  include_once 'list_order.php';
}

?>
</div>
</main>
</div>
</div>


<?php
include_once 'bottom.php';
?>
