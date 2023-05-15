<?php
require_once 'dbkoneksi.php';
?>
<?php 
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if(!empty($_id)){
    $sql = "SELECT * FROM order WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
}else{
    $row = [];
    }
?>
                            <div class="card-body" style="text-align: center;">
                            <form method="POST" action="proses_order.php">
                            <div class="form-group row">
    <label for="kode" class="col-4 col-form-label">Id</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-anchor"></i>
          </div>
        </div> 
        <input id="id" name="id" type="text" class="form-control"
        value="<?php if(isset($row['id'])) echo $row['id']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">order_number</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="order_number" name="order_number" type="text" class="form-control" 
        value="<?php if(isset($row['order_number'])) echo $row['order_number']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">date</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="date" name="date" type="date" class="form-control" 
        value="<?php if(isset($row['date'])) echo $row['date']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="harga_beli" class="col-4 col-form-label">Qty</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="Qty" name="Qty" 
        value="<?php if(isset($row['Qty'])) echo $row['Qty']; ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">total_price</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="total_price" name="total_price" value="<?php if(isset($row['total_price'])) echo $row['total_price']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="min_stok" class="col-4 col-form-label">customer_id</label> 
    <div class="col-8">
      <?php
        $sqlcust = "SELECT * FROM customer";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="customer_id" name="customer_id" class="form-select">
        <?php
        foreach ($rscust as $rowcust) { 
        ?>
          <option value="<?= $rowcust['id'] ?>"><?= $rowcust['name'] ?></option>
          <?php
        }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">product_id</label> 
    <div class="col-8">
    <?php
        $sqlcust = "SELECT * FROM product";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="product_id" name="product_id" class="form-select">
        <?php
        foreach ($rscust as $rowcust) { 
        ?>
          <option value="<?= $rowcust['id'] ?>"><?= $rowcust['name'] ?></option>
          <?php
        }
          ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
<div class="offset-4 col-8">
    <?php
        $button = (empty($_id)) ? "Simpan":"Update"; 
    ?>
      <input type="submit" name="process" type="submit" 
      class="btn btn-primary" value="<?=$button?>"/>
      <input type="hidden" name="id" value="<?=$_id?>"/>
    </div>
  </div>
</form>

