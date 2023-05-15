<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM product";
   $rs = $dbh->query($sql);
?>

      <a class="btn btn-success" href="form_product.php" role="button">Create Produk</a>
      <br>
      <br>
        <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Sku</th>
                    <th>Name</th>
                    <th>Purchase_price</th>
                    <th>Sell_Price</th>
                    <th>Stock</th>
                    <th>Min_stock</th>
                    <th>Product_type_id</th>
                    <th>Restock_id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor  =1 ;
                foreach($rs as $row){
                ?>
                    <tr>
                        <td><?=$nomor?>
                    </td>
                        <td><?=$row['id']?>
                    </td>
                        <td><?=$row['Sku']?>
                    </td>
                        <td><?=$row['name']?>
                    </td>
                        <td><?=$row['purchase_price']?>
                    </td>
                        <td><?=$row['sell_price']?>
                    </td>
                        <td><?=$row['stock']?>
                    </td>
                        <td><?=$row['min_stock']?>
                    </td>
                        <td><?=$row['product_type_id']?>
                    </td>
                        <td><?=$row['restock_id']?>
                    </td>

                        <td>
<a class="btn btn-primary" href="view_produk.php?id=<?=$row['id']?>">View</a>
<a class="btn btn-warning" href="form_produk.php?idedit=<?=$row['id']?>">Edit</a>
<a class="btn btn-danger" href="proses_produk.php?iddel=<?=$row['id']?>"
onclick="if(!confirm('Anda Yakin Hapus Data Produk <?=$row['name']?>?')) {return false}"
>Delete</a>
</td>
                    </tr>
                <?php 
                $nomor++;   
                } 
                ?>
            </tbody>
        </table>

