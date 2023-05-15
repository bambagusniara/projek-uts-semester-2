<?php
require_once 'dbkoneksi.php';


if (isset($_POST['proses'])) {
    $_proses = $_POST['proses'];
    $_nama = $_POST['nama'];
    $_gender = $_POST['Gender'];
    $phone = $_POST['phone'];
    $_email = $_POST['Email'];
    $address = $_POST['address'];
    $card = $_POST['card_id'];

    // array data
    $ar_data[] = $_order; // ? 2
    $ar_data[] = $_gender; // 3
    $ar_data[] = $phone; // 4
    $ar_data[] = $_email; // 5
    $ar_data[] = $address;
    $ar_data[] = $card; // 6

}


if (isset($_GET['iddel']) && empty($_proses)) {
    $sql = "DELETE FROM product WHERE id=?";
    $ar_data[] = $_GET['iddel'];
} else if ($_proses == "Simpan") {
    // data baru
    $sql = "INSERT INTO product (nama,Gender,phone,Email,
    customer_id,address,card_id) VALUES (?,?,?,?,?,?,?,?)";
} else if ($_proses == "Update") {
    $ar_data[] = $_POST['idedit']; // ? 8
    $sql = "UPDATE product SET id=?,nama=?,Gender=?,
    phone=?,Email=?,customer_id=?,address=?,card_id=? WHERE id=?";
}
if (isset($sql)) {
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
}

header('location:index.php?hal=list_order');
?>

