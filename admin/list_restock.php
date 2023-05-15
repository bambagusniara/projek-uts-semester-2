<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM restock";
   $rs = $dbh->query($sql);
?>

      <a class="btn btn-success" href="form_restock.php" role="button">Create Produk</a>
      <br>
      <br>
        <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Restock_number</th>
                    <th>Date</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Supplier_id</th>
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
                        <td><?=$row['restock_number']?>
                    </td>
                        <td><?=$row['date']?>
                    </td>
                        <td><?=$row['qty']?>
                    </td>
                        <td><?=$row['supplier_id']?>
                    </td>
                       

                        <td>
<a class="btn btn-primary" href="res.php?id=<?=$row['id']?>">View</a>
<a class="btn btn-warning" href="form_restock.php?idedit=<?=$row['id']?>">Edit</a>
<a class="btn btn-danger" href="delete_restock.php?iddel=<?=$row['id']?>"
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

