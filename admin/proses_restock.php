<?php
require_once 'dbkoneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_restock = $_POST['restock_number'];
    $_date = $_POST['date'];
    $qty = $_POST['qty'];
    $_price = $_POST['price'];
    $supplier = $_POST['suplier_id'];
    
    // array data
    $ar_data[] = $_restock; // ? 2
    $ar_data[] = $_date; // 3
    $ar_data[] = $qty; // 4
    $ar_data[] = $_price; // 5
    $ar_data[] = $supplier;
    
}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM restock WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO restock (restock_number,date,qty,price,
    supplier_i ) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE restock SET id=?,restock_number=?,date=?,
    qty=?,price=?,supplier_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_restock');

?>

