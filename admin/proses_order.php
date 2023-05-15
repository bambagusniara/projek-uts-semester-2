<?php
require_once 'dbkoneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_order = $_POST['order_number'];
    $_date = $_POST['date'];
    $qty = $_POST['qty'];
    $_total = $_POST['total_price'];
    $customer = $_POST['customer_id'];
    $product = $_POST['product_id'];

    // array data
    $ar_data[] = $_order; // ? 2
    $ar_data[] = $_date; // 3
    $ar_data[] = $qty; // 4
    $ar_data[] = $_total; // 5
    $ar_data[] = $customer;
    $ar_data[] = $product; // 6

}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM product WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO product (order_number,date,qty,total_price,
    customer_id,customer_id,product_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE product SET id=?,order_number=?,date=?,
    qty=?,total_price=?,customer_id=?,customer_id=?,product_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_order');
?>

