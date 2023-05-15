<?php 
    require_once 'dbkoneksi.php';
?>
<?php 
   $sql = "SELECT * FROM order";
   $rs = $dbh->query($sql);
?>

      <a class="btn btn-success" href="form_order.php" role="button">Create Produk</a>
      <br>
      <br>
        <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>order_number</th>
                    <th>date</th>
                    <th>Qty</th>
                    <th>Total_Price</th>
                    <th>customer_id</th>
                    <th>product_id</th>
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
                        <td><?=$row['order_number']?>
                    </td>
                        <td><?=$row['date']?>
                    </td>
                        <td><?=$row['Qty']?>
                    </td>
                        <td><?=$row['total_price']?>
                    </td>
                        <td><?=$row['customer_id']?>
                    </td>
                        <td><?=$row['product_id']?>
                    </td>
                       

                        <td>
<a class="btn btn-primary" href="view_order.php?id=<?=$row['id']?>">View</a>
<a class="btn btn-warning" href="form_order.php?idedit=<?=$row['id']?>">Edit</a>
<a class="btn btn-danger" href="proses_order.php?iddel=<?=$row['id']?>"
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

