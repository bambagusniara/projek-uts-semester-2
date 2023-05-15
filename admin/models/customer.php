
<?php 
 
class custumer{ 
    private $koneksi; 
    public function __construct(){ 
        //function adalah finction yang pertama kali di jalankan 
        global $conn; 
        $this->koneksi = $conn; 
    } 
    public function tampilPesanan(){ 
// Cetak seluruh data tabl produk menggunakan query select 
        $sql = "SELECT * From pesanan"; 
         
// gunakan method prepare untuk mengirim data sql 
        $ps = $this->koneksi->prepare($sql); 
// eksekusi data yang sudah digunakan method prepare 
        $ps->execute(); 
// siapkan data sql yang sudah di eksekusi menggunakan method fetchAll 
        $data = $ps->fetchAll(); 
// kembalikan data produk yang alam bentuk array 
        return $data; 
    } 
} 
?>