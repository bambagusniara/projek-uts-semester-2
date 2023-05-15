<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<FIeldset>
<form method="POST" action="proses_product.php">
    <h2>form product</h2>
    <hr>
    <div class="form-group row">
        <label for="id" class="col-4 col-form-label">Id</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="id" name="id" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="Sku" class="col-4 col-form-label">Sku</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="Sku" name="Sku" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="nama" class="col-4 col-form-label">Nama</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="nama" name="nama" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="purchase_price" class="col-4 col-form-label">Purchase_price</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="purchase_price" name="purchase_price" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="sell_price" class="col-4 col-form-label">Sell_Price</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                       
                    </div>
                </div>
                <input id="sell_price" name="sell_price" value="" type="teks" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-4 col-form-label">Stock</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="stock" name="stock" value="" type="number" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="min_stock" class="col-4 col-form-label">min_stok</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        
                    </div>
                </div>
                <input id="min_stock" name="min_stock" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
    <label for="jenis" class="col-4 col-form-label">product_type</label> 
    <div class="col-8">
        <?php 
            $sqltipe_product = "SELECT * FROM product_type";
            $rstipe_product = $dbh->query($sqltipe_product);
        ?>
      <select id="product_type_id" name="product_type_id" class="custom-select">
          <?php 
            foreach($rstipe_product as $rowtipe_product){
         ?>
            <option value="<?=$rowtipe_product['id']?>"><?=$rowtipe_product['nama']?></option>
         <?php
            }
        ?>
        
        <option value="1">Cetaphil Facial Cleanser</option>
        <option value="2">L'Oreal Paris Hair Care</option>
        <option value="3">Colgate Teeth Care</option>
        <option value="4">Imboost Force</option>
        <option value="5">Scarlett Jolly Body Lotion</option>

      </select>
    </div>
  </div>


    <div class="form-group row">
<label for="restock_id" class="col-4 col-form-label">restock_id</label>
        <div class="col-8">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                       
                    </div>
                </div>
                <input id="restock_id" name="restock_id" value="" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?php if (isset($_GET['idedit'])) {
                echo 'Update';
            } else {
                echo 'Simpan';
            } ?>" />
        </div>
    </div>
    <?php if (isset($_GET['idedit'])){ ?>
    <input type="hidden" name="idedit" value="<?php echo $_GET['idedit']; // send variable idedit ?>">
    <?php } ?>
</form>

