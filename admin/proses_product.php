<?php
require_once 'dbkoneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_Sku = $_POST['Sku'];
    $_purchase = $_POST['purchase_price'];
    $sell = $_POST['sell_price'];
    $_stok = $_POST['stock'];
    $min = $_POST['min_stock'];
    $product = $_POST['product_type_id'];
    $restock = $_POST['restock_id'];

    // array data
    $ar_data[] = $_Sku; // ? 2
    $ar_data[] = $_purchase; // 3
    $ar_data[] = $sell; // 4
    $ar_data[] = $_stok; // 5
    $ar_data[] = $min;
    $ar_data[] = $product; // 6
    $ar_data[] = $restock; // ? 7

}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM product WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO product (Sku,purchase_price,sell_price,stock,
    min_stock,product_type_id,restock_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE product SET id=?,Sku=?,purchase_price=?,
    sell_price=?,stock=?,min_stock=?,product_type_id=?,restock_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_order');
?>

