<?php 
$model = new costumer();  
$data_customer = $model->tampilPesanan(); 
?>
<?php 
   $sql = "SELECT * FROM Customer";
   $rs = $dbh->query($sql);
?>

      <a class="btn btn-success" href="form_customer.php" role="button">Create Produk</a>
      <br>
      <br>
        <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>nama</th>
                    <th>Gender</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>Address</th>
                    <th>card_id</th>
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
                        <td><?=$row['nama']?>
                    </td>
                        <td><?=$row['Gender']?>
                    </td>
                        <td><?=$row['phone']?>
                    </td>
                        <td><?=$row['Email']?>
                    </td>
                        <td><?=$row['address']?>
                    </td>
                        <td><?=$row['card_id']?>
                    </td>
                       

                        <td>
<a class="btn btn-primary" href="view_customer.php?id=<?=$row['id']?>">View</a>
<a class="btn btn-warning" href="form_customer.php?idedit=<?=$row['id']?>">Edit</a>
<a class="btn btn-danger" href="proses_customer.php?iddel=<?=$row['id']?>"
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

