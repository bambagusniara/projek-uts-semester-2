<?php
require_once 'dbkoneksi.php';
?>
<?php 
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if(!empty($_id)){
    $sql = "SELECT * FROM restock WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
}else{
    $row = [];
    }
?>
                            <div class="card-body" style="text-align: center;">
                            <form method="POST" action="proses_restock.php">
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
    <label for="nama" class="col-4 col-form-label">Restock_number</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="restock_number" name="restock_number" type="text" class="form-control" 
        value="<?php if(isset($row['restock_number'])) echo $row['restock_number']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Tanggal</label> 
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
    <label for="qty" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="qty" name="qty" 
        value="<?php if(isset($row['qty'])) echo $row['qty']; ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="price" class="col-4 col-form-label">Total Harga</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="price" name="price" value="<?php if(isset($row['price'])) echo $row['price']; ?>"
        type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="supplier_id" class="col-4 col-form-label">Supplier_id</label> 
    <div class="col-8">
      <?php
        $sqlcust = "SELECT * FROM customer";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="supplier_id" name="supplier_id" class="form-select">
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


