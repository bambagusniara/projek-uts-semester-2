<?php
require_once 'dbkoneksi.php';
?>
<?php 
$_id = isset($_GET['id']) ? $_GET['id'] : null;
if(!empty($_id)){
    $sql = "SELECT * FROM Customer WHERE id=?";
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
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="nama" name="nama" type="text" class="form-control" 
        value="<?php if(isset($row['nama'])) echo $row['nama']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Gender</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-adjust"></i>
          </div>
        </div> 
        <input id="Gender" name="Gender" type="teks" class="form-control" 
        value="<?php if(isset($row['Gender'])) echo $row['Gender']; ?>">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="harga_beli" class="col-4 col-form-label">Phone</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-o-left"></i>
          </div>
        </div> 
        <input id="phone" name="phone" 
        value="<?php if(isset($row['phone'])) echo $row['phone']; ?>" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-arrow-circle-up"></i>
          </div>
        </div> 
        <input id="Email" name="Email" value="<?php if(isset($row['Email'])) echo $row['Email']; ?>"
        type="email" class="form-control">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="min_stok" class="col-4 col-form-label">Address</label> 
    <div class="col-8">
      <?php
        $sqlcust = "SELECT * FROM customer";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="address" name="address" class="form-select">
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
    <label for="nama" class="col-4 col-form-label">card_id</label> 
    <div class="col-8">
    <?php
        $sqlcust = "SELECT * FROM product";
        $rscust = $dbh->query($sqlcust);
      ?>
      <select id="card_id" name="card_id" class="form-select">
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

