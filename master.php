<?php
    include("connection.php");

    $response = array();

    if (isset($_POST["function"])) {
        $func = $_POST["function"];
        // if ($func == "loginCust") {
        //     loginCust($conn);
        // }
        if ($func == "RegisterCust") {
            RegisterCust($conn);
        } else if ($func == "selectAllCust"){
            selectAllCust($conn);
        } else if ($func == "AddReservation"){
            AddReservation($conn);
        } else if ($func == "selectIdHtrans"){
            selectIdHtrans($conn);
        } else if ($func == "selectAllMenuMakanan"){
            selectAllMenuMakanan($conn);
        } else if ($func == "selectAllRestoran"){
            selectAllRestoran($conn);
        } else if ($func == "AddMenuMakanan"){
            AddMenuMakanan($conn);
        } else if ($func == "RegisterRestoran"){
            RegisterRestoran($conn);
        } else if ($func == "RegisterRestoran2"){
            RegisterRestoran2($conn);
        } else if ($func == "AddPesananMakanan"){
            AddPesananMakanan($conn);
        } else if ($func == "PesananSaya"){
            PesananSaya($conn);
        } else if ($func == "AddVoucher"){
            AddVoucher($conn);
        } else if ($func == "selectAllVoucher"){
            selectAllVoucher($conn);
        } else if ($func == "selectAllFasilitas"){
            selectAllFasilitas($conn);
        } else if ($func == "AddFasilitas"){
            AddFasilitas($conn);
        } else if ($func == "selectRatingReview"){
            selectRatingReview($conn);
        } else if ($func == "AddRatingReview"){
            AddRatingReview($conn);
        } else if ($func == "KonfirmasiRegistrasiRestoran"){
            KonfirmasiRegistrasiRestoran($conn);
        } else if ($func == "selectDataRestoBelumAktif"){
            selectDataRestoBelumAktif($conn);
        } else if ($func == "selectHTransaksi"){
            selectHTransaksi($conn);
        } else if ($func == "selectDTransaksi"){
            selectDTransaksi($conn);
        } else if ($func == "setStatusTransaksi"){
            setStatusTransaksi($conn);
        } else if ($func == "requestPinjamFasilitas"){
            requestPinjamFasilitas($conn);
        } else if ($func == "minusFasilitas"){
            minusFasilitas($conn);
        } else if ($func == "EditProfileCustomer"){
            EditProfileCustomer($conn);
        } else if ($func == "DeleteAccountCustomer"){
            DeleteAccountCustomer($conn);
        } else if ($func == "ClaimVoucher"){
            ClaimVoucher($conn);
        } else if ($func == "selectHariJamBukaResto"){
            selectHariJamBukaResto($conn);
        } else if ($func == "selectVoucherYangDiclaim"){
            selectVoucherYangDiclaim($conn);
        } else if ($func == "selectFasilitasYangDipinjam"){
            selectFasilitasYangDipinjam($conn);
        } else if ($func == "FilterHarga"){
            FilterHarga($conn);
        } else if ($func == "MemprosesPesanan"){
            MemprosesPesanan($conn);
        } else if ($func == "RescheduleTanggalReservasi"){
            RescheduleTanggalReservasi($conn);
        } else if ($func == "BatalkanPesanan"){
            BatalkanPesanan($conn);
        } else if ($func == "EditMenuMakanan"){
            EditMenuMakanan($conn);
        } else if ($func == "DeleteMenuMakanan"){
            DeleteMenuMakanan($conn);
        } else if ($func == "EditFasilitas"){
            EditFasilitas($conn);
        } else if ($func == "DeleteFasilitas"){
            DeleteFasilitas($conn);
        } else if ($func == "EditVoucher"){
            EditVoucher($conn);
        } else if ($func == "DeleteVoucher"){
            DeleteVoucher($conn);
        } else if ($func == "HapusAccountRestoran"){
            HapusAccountRestoran($conn);
        } else if ($func == "EditIdentitasRestoran"){
            EditIdentitasRestoran($conn);
        } else if ($func == "EditGambarDanHariJamBuka"){
            EditGambarDanHariJamBuka($conn);
        } else if ($func == "MakananTerlaris"){
            MakananTerlaris($conn);
        } else if ($func == "PelangganSetia"){
            PelangganSetia($conn);
        } else if ($func == "PesananSelesai"){
            PesananSelesai($conn);
        } else if ($func == "selectRestoBerdasarkanHariJamBuka"){
            selectRestoBerdasarkanHariJamBuka($conn);
        } else if ($func == "CreatePaymentLink"){
            CreatePaymentLink($conn);
        } else if ($func == "GetMidtransResponseCode"){
            GetMidtransResponseCode($conn);
        }
    } else {
        $response["code"] = -1;
        $response["message"] = "No function data found";        
        echo json_encode($response);
    }

    // function loginCust($conn) {
    //     if (isset($_POST["username"]) && isset($_POST["password"])) {
    //         $username = $_POST["username"];
    //         $password = $_POST["password"];
    //         $sql_query = "SELECT * FROM customer WHERE username_customer = '$username'and password_customer = '$password'";
    //         $result = mysqli_query($conn, $sql_query);
    //         if (mysqli_num_rows($result) > 0) {
    //             $response["code"] = 2;
    //             $response["message"] = "Login Successful";
    //             $data = array();
    //             $arruser = array();
    //             $ctr = 0;
    //             while($row = mysqli_fetch_array($result)) {
    //                 $data["id_customer"] = $row["id_customer"];
    //                 $data["username_customer"] = $row["username_customer"];
    //                 $data["password_customer"] = $row["password_customer"];
    //                 $data["nama_customer"] = $row["nama_customer"];
    //                 $data["email_customer"] = $row["email_customer"];
    //                 $data["status_customer"] = $row["status_customer"];
    //                 $arruser[$ctr] = $data;
    //                 $ctr++;
    //             }
    //             mysqli_free_result($result);
    //             $response["userLogin"] = $arruser;
    //         } else {
    //             $response["code"] = -3;
    //             $response["message"] = "Invalid Username or Password";
    //         }
               
    //     } else {
    //         $response["code"] = -2;
    //         $response["message"] = "Invalid Data";
    //     }
    //     echo json_encode($response);
    // }

    function RegisterCust($conn) {
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["telp"]) && isset($_POST["status"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $telp = $_POST["telp"];
            $status = $_POST["status"];
            $sql_insert = "INSERT INTO customer(username_customer, password_customer, nama_customer, email_customer, telp_customer, status_customer) VALUES ('$username', '$password', '$nama', '$email', '$telp', '$status')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectAllCust($conn) {
        $sql = "SELECT * FROM customer";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrcust = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_customer"] = $row["id_customer"];
                $data["username_customer"] = $row["username_customer"];
                $data["password_customer"] = $row["password_customer"];
                $data["nama_customer"] = $row["nama_customer"];
                $data["email_customer"] = $row["email_customer"];
                $data["telp_customer"] = $row["telp_customer"];
                $data["status_customer"] = $row["status_customer"];
                $arrcust[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datacust"] = $arrcust;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function AddReservation($conn){
        if (isset($_POST["id_customer"]) && isset($_POST["nama_client"]) && isset($_POST["nomor_telp"]) && isset($_POST["tanggal_reservasi"]) && isset($_POST["jam_reservasi"]) && isset($_POST["jumlah_orang"]) && isset($_POST["note_transaksi"])) {
            $id = $_POST["id_customer"];
            $nama = $_POST["nama_client"];
            $telp = $_POST["nomor_telp"];
            $tanggal = $_POST["tanggal_reservasi"];
            $jam = $_POST["jam_reservasi"];
            $jumlah = $_POST["jumlah_orang"];
            $note = $_POST["note_transaksi"];
            $status = 'Belum dikonfirmasi';
            $sql_insert = "INSERT INTO htrans_reservasi(id_customer, nama_client, nomor_telepon_client, tanggal_reservasi, jam_reservasi, jumlah_orang, note_transaksi, status_pesanan) VALUES ('$id','$nama', '$telp', '$tanggal', '$jam', '$jumlah', '$note', '$status')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectIdHtrans($conn) {
        if(isset($_POST["nama_client"]) && isset($_POST["nomor_telp"]) && isset($_POST["tanggal_reservasi"]) && isset($_POST["jam_reservasi"]) && isset($_POST["jumlah_orang"]) && isset($_POST["note_transaksi"])){
            $nama = $_POST["nama_client"];
            $telp = $_POST["nomor_telp"];
            $tanggal = $_POST["tanggal_reservasi"];
            $jam = $_POST["jam_reservasi"];
            $jumlah = $_POST["jumlah_orang"];
            $note = $_POST["note_transaksi"];
            $sql = "SELECT id_htrans_reservasi FROM htrans_reservasi WHERE nama_client ='$nama' and nomor_telepon_client = '$telp' and tanggal_reservasi = '$tanggal' and jam_reservasi = '$jam' and jumlah_orang = '$jumlah' and note_transaksi = '$note'";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["id_htrans"] = $result2;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            };
        }
        else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        
        echo json_encode($response);
    }

    function selectAllMenuMakanan($conn) {
        if(isset($_POST["id_restoran"])){
            $id = $_POST["id_restoran"];
            $sql = "SELECT id_menu, nama_menu, kategori_menu, status_menu, deskripsi_menu, harga_menu FROM menu_makanan WHERE id_restoran='$id' and status_menu='Ada'";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $data = array();
                $arrMenu = array();
                $ctr = 0;
                while($row = mysqli_fetch_array($result2)) {
                    $data["id_menu"] = $row["id_menu"];
                    $data["nama_menu"] = $row["nama_menu"];
                    $data["kategori_menu"] = $row["kategori_menu"];
                    $data["status_menu"] = $row["status_menu"];
                    $data["deskripsi_menu"] = $row["deskripsi_menu"];
                    $data["harga_menu"] = $row["harga_menu"];
                    $arrMenu[$ctr] = $data;
                    $ctr++;
                }
                mysqli_free_result($result2);
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["datamenu"] = $arrMenu;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            }
        }
        else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        
        echo json_encode($response);
    }

    function AddMenuMakanan($conn){
        if (isset($_POST["nama_menu"]) && isset($_POST["kategori_menu"]) && isset($_POST["status_menu"]) && isset($_POST["deskripsi_menu"]) && isset($_POST["harga_menu"]) && isset($_POST["id_restoran"]) && isset($_POST["image"])) {
            $nama = $_POST["nama_menu"];
            $kategori = $_POST["kategori_menu"];
            $status = $_POST["status_menu"];
            $deskripsi = $_POST["deskripsi_menu"];
            $harga = $_POST["harga_menu"];
            $id = $_POST["id_restoran"];
            $path = "imagesMenu/". str_replace(" ", "", $nama).$id.".jpg";
            $sql_insert = "INSERT INTO menu_makanan(nama_menu, kategori_menu, status_menu, deskripsi_menu, harga_menu, id_restoran) VALUES ('$nama', '$kategori', '$status', '$deskripsi', '$harga', '$id')";
            file_put_contents($path, base64_decode($_POST["image"]));
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectAllRestoran($conn){
        $sql = "SELECT id_restoran, username_restoran, password_restoran, nama_restoran, alamat_restoran, daerah_restoran, email_restoran, telp_restoran, status_restoran FROM restoran";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrResto = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_restoran"] = $row["id_restoran"];
                $data["username_restoran"] = $row["username_restoran"];
                $data["password_restoran"] = $row["password_restoran"];
                $data["nama_restoran"] = $row["nama_restoran"];
                $data["alamat_restoran"] = $row["alamat_restoran"];
                $data["daerah_restoran"] = $row["daerah_restoran"];
                $data["email_restoran"] = $row["email_restoran"];
                $data["telp_restoran"] = $row["telp_restoran"];
                $data["status_restoran"] = $row["status_restoran"];
                $arrResto[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datarestoran"] = $arrResto;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function RegisterRestoran($conn){
        if (isset($_POST["username_restoran"]) && isset($_POST["password_restoran"]) && isset($_POST["nama_restoran"]) && isset($_POST["alamat_restoran"]) && isset($_POST["daerah_restoran"]) && isset($_POST["email_restoran"]) && isset($_POST["telp_restoran"]) && isset($_POST["image_depan"]) && isset($_POST["image_dalam"]) && isset($_POST["image_ruangan"]) && isset($_POST["image_sertifikat"])) {
            $username = $_POST["username_restoran"];
            $password = $_POST["password_restoran"];
            $nama = $_POST["nama_restoran"];
            $alamat = $_POST["alamat_restoran"];
            $daerah = $_POST["daerah_restoran"];
            $email = $_POST["email_restoran"];
            $telp = $_POST["telp_restoran"];
            $status = 'Belum Aktif';
            $path = "imagesResto/". str_replace(" ", "", $nama)."BagianDepan".".jpg";
            file_put_contents($path, base64_decode($_POST["image_depan"]));
            $path2 = "imagesResto/". str_replace(" ", "", $nama)."BagianDalam".".jpg";
            file_put_contents($path2, base64_decode($_POST["image_dalam"]));
            $path3 = "imagesResto/". str_replace(" ", "", $nama)."BagianRuangan".".jpg";
            file_put_contents($path3, base64_decode($_POST["image_ruangan"]));
            $path4 = "imagesResto/". str_replace(" ", "", $nama)."Sertifikat".".jpg";
            file_put_contents($path4, base64_decode($_POST["image_sertifikat"]));
            $sql_insert = "INSERT INTO restoran(username_restoran, password_restoran, nama_restoran, alamat_restoran, daerah_restoran, email_restoran, telp_restoran, status_restoran) VALUES ('$username', '$password', '$nama', '$alamat', '$daerah', '$email', '$telp', '$status')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function RegisterRestoran2($conn){
        if (isset($_POST["id_restoran"]) && isset($_POST["hari_buka"]) && isset($_POST["jam_buka"])) {
            $id = $_POST["id_restoran"];
            $hari = $_POST["hari_buka"];
            $jam = $_POST["jam_buka"];
            $sql_insert = "INSERT INTO hari_jam_buka_restoran(id_restoran, hari_buka, jam_buka) VALUES ('$id', '$hari', '$jam')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function AddPesananMakanan($conn){
        if(isset($_POST["id_htrans"]) && isset($_POST["nama_makanan"]) && isset($_POST["jumlah_makanan"]) && isset($_POST["total_harga"]) && isset($_POST["id_restoran"])){
            $id = $_POST["id_htrans"];
            $nama = $_POST["nama_makanan"];
            $jumlah = $_POST["jumlah_makanan"];
            $total = $_POST["total_harga"];
            $idresto = $_POST["id_restoran"];
            $sql_insert = "INSERT INTO dtrans_reservasi(id_htrans_reservasi, nama_makanan, jumlah_makanan) VALUES ('$id', '$nama', '$jumlah')";
            $query = mysqli_query($conn, $sql_insert);
            $sql_update = "UPDATE htrans_reservasi SET total_harga='$total', id_restoran='$idresto' WHERE id_htrans_reservasi='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query && $query2) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function PesananSaya($conn){
        $idcus = $_POST["id_cust"];
        $sql = "SELECT h.id_htrans_reservasi, r.nama_restoran, h.tanggal_reservasi, h.jam_reservasi, h.total_harga, h.status_pesanan FROM restoran r, htrans_reservasi h WHERE h.id_customer = '$idcus' AND h.id_restoran = r.id_restoran";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrbill = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_htrans_reservasi"] = $row["id_htrans_reservasi"];
                $data["nama_restoran"] = $row["nama_restoran"];
                $data["tanggal_reservasi"] = $row["tanggal_reservasi"];
                $data["jam_reservasi"] = $row["jam_reservasi"];
                $data["total_harga"] = $row["total_harga"];
                $data["status_pesanan"] = $row["status_pesanan"];
                $arrbill[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datapesanan"] = $arrbill;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function selectAllVoucher($conn){
        $sql = "SELECT * FROM voucher_restoran";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_voucher"] = $row["id_voucher"];
                $data["kode_voucher"] = $row["kode_voucher"];
                $data["jenis_voucher"] = $row["jenis_voucher"];
                $data["jenis_potongan"] = $row["jenis_potongan"];
                $data["jumlah_diskon"] = $row["jumlah_diskon"];
                $data["kuota_voucher"] = $row["kuota_voucher"];
                $data["minimum_pembelian"] = $row["minimum_pembelian"];
                $data["maksimal_potongan"] = $row["maksimal_potongan"];
                $data["tanggal_awal"] = $row["tanggal_awal"];
                $data["tanggal_berakhir"] = $row["tanggal_berakhir"];
                $data["status_voucher"] = $row["status_voucher"];
                $data["id_restoran"] = $row["id_restoran"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datavoucher"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function AddVoucher($conn){
        if (isset($_POST["kode_voucher"]) && isset($_POST["jenis_voucher"]) && isset($_POST["jenis_potongan"]) && isset($_POST["jumlah_diskon"]) && isset($_POST["kuota_voucher"]) && isset($_POST["minimum_pembelian"]) && isset($_POST["maksimal_potongan"]) && isset($_POST["tanggal_awal"]) && isset($_POST["tanggal_berakhir"]) && isset($_POST["status_voucher"]) && isset($_POST["id_restoran"]) && isset($_POST["image_banner"])) {
            $idvouch = $_POST["kode_voucher"];
            $jenisv = $_POST["jenis_voucher"];
            $jenisp = $_POST["jenis_potongan"];
            $jumlahdisc = $_POST["jumlah_diskon"];
            $kuota = $_POST["kuota_voucher"];
            $minim = $_POST["minimum_pembelian"];
            $maksimal = $_POST["maksimal_potongan"];
            $ta = $_POST["tanggal_awal"];
            $tb = $_POST["tanggal_berakhir"];
            $status = $_POST["status_voucher"];
            $idresto = $_POST["id_restoran"];
            $path = "imagesResto/"."Banner"."$idvouch".".jpg";
            file_put_contents($path, base64_decode($_POST["image_banner"]));
            $sql_insert = "INSERT INTO voucher_restoran(kode_voucher, jenis_voucher, jenis_potongan, jumlah_diskon, kuota_voucher, minimum_pembelian, maksimal_potongan, tanggal_awal, tanggal_berakhir, status_voucher, id_restoran) VALUES ('$idvouch', '$jenisv', '$jenisp', '$jumlahdisc', '$kuota', '$minim', '$maksimal', '$ta', '$tb', '$status', '$idresto')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else if (isset($_POST["kode_voucher"]) && isset($_POST["jenis_voucher"]) && isset($_POST["jenis_potongan"]) && isset($_POST["jumlah_diskon"]) && isset($_POST["kuota_voucher"]) && isset($_POST["minimum_pembelian"]) && isset($_POST["maksimal_potongan"]) && isset($_POST["tanggal_awal"]) && isset($_POST["tanggal_berakhir"]) && isset($_POST["status_voucher"]) && isset($_POST["id_restoran"])) {
            $idvouch = $_POST["kode_voucher"];
            $jenisv = $_POST["jenis_voucher"];
            $jenisp = $_POST["jenis_potongan"];
            $jumlahdisc = $_POST["jumlah_diskon"];
            $kuota = $_POST["kuota_voucher"];
            $minim = $_POST["minimum_pembelian"];
            $maksimal = $_POST["maksimal_potongan"];
            $ta = $_POST["tanggal_awal"];
            $tb = $_POST["tanggal_berakhir"];
            $status = $_POST["status_voucher"];
            $idresto = $_POST["id_restoran"];
            $sql_insert = "INSERT INTO voucher_restoran(kode_voucher, jenis_voucher, jenis_potongan, jumlah_diskon, kuota_voucher, minimum_pembelian, maksimal_potongan, tanggal_awal, tanggal_berakhir, status_voucher, id_restoran) VALUES ('$idvouch', '$jenisv', '$jenisp', '$jumlahdisc', '$kuota', '$minim', '$maksimal', '$ta', '$tb', '$status', '$idresto')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectAllFasilitas($conn){
        $sql = "SELECT * FROM fasilitas_restoran";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_fasilitas"] = $row["id_fasilitas"];
                $data["nama_fasilitas"] = $row["nama_fasilitas"];
                $data["jumlah_fasilitas"] = $row["jumlah_fasilitas"];
                $data["status_fasilitas"] = $row["status_fasilitas"];
                $data["id_restoran"] = $row["id_restoran"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datafasilitas"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function AddFasilitas($conn){
        if (isset($_POST["nama_fasilitas"]) && isset($_POST["jumlah_fasilitas"]) && isset($_POST["status_fasilitas"]) && isset($_POST["id_restoran"])) {
            $namafasilitas = $_POST["nama_fasilitas"];
            $jumlahfasilitas = $_POST["jumlah_fasilitas"];
            $status = $_POST["status_fasilitas"];
            $idresto = $_POST["id_restoran"];
            $sql_insert = "INSERT INTO fasilitas_restoran(nama_fasilitas, jumlah_fasilitas, status_fasilitas, id_restoran) VALUES ('$namafasilitas', '$jumlahfasilitas', '$status', '$idresto')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectRatingReview($conn){
        $sql = "SELECT jumlah_bintang, review, kategori_terpilih, id_restoran, id_customer FROM rating_review";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["jumlah_bintang"] = $row["jumlah_bintang"];
                $data["review"] = $row["review"];
                $data["kategori_terpilih"] = $row["kategori_terpilih"];
                $data["id_restoran"] = $row["id_restoran"];
                $data["id_customer"] = $row["id_customer"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datarestoran"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function AddRatingReview($conn){
        if (isset($_POST["jumlah_bintang"]) && isset($_POST["review"]) && isset($_POST["kategori_terpilih"]) && isset($_POST["id_restoran"]) && isset($_POST["id_customer"])) {
            $bintang = $_POST["jumlah_bintang"];
            $review = $_POST["review"];
            $kategori = $_POST["kategori_terpilih"];
            $idresto = $_POST["id_restoran"];
            $idcust = $_POST["id_customer"];
            $sql_insert = "INSERT INTO rating_review(jumlah_bintang, review, kategori_terpilih, id_restoran, id_customer) VALUES ('$bintang', '$review', '$kategori', '$idresto', '$idcust')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectDataRestoBelumAktif($conn){
        $sql = "SELECT id_restoran, nama_restoran, alamat_restoran, daerah_restoran FROM restoran WHERE status_restoran='Belum Aktif'";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_restoran"] = $row["id_restoran"];
                $data["nama_restoran"] = $row["nama_restoran"];
                $data["alamat_restoran"] = $row["alamat_restoran"];
                $data["daerah_restoran"] = $row["daerah_restoran"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datarestoran"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function KonfirmasiRegistrasiRestoran($conn){
        if (isset($_POST["id_restoran"])) {
            $id = $_POST["id_restoran"];
            $sql_insert = "UPDATE restoran SET status_restoran='Aktif' WHERE id_restoran='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectHTransaksi($conn){
        $sql = "SELECT h.id_htrans_reservasi, h.id_customer, h.nama_client, h.nomor_telepon_client, h.tanggal_reservasi, h.jam_reservasi, h.jumlah_orang, h.note_transaksi, h.total_harga, h.id_restoran, h.status_pesanan FROM htrans_reservasi h";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_htrans_reservasi"] = $row["id_htrans_reservasi"];
                $data["id_customer"] = $row["id_customer"];
                $data["nama_client"] = $row["nama_client"];
                $data["nomor_telepon_client"] = $row["nomor_telepon_client"];
                $data["tanggal_reservasi"] = $row["tanggal_reservasi"];
                $data["jam_reservasi"] = $row["jam_reservasi"];
                $data["jumlah_orang"] = $row["jumlah_orang"];
                $data["note_transaksi"] = $row["note_transaksi"];
                $data["total_harga"] = $row["total_harga"];
                $data["id_restoran"] = $row["id_restoran"];
                $data["status_pesanan"] = $row["status_pesanan"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datatransaksi"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function selectDTransaksi($conn){
        if(isset($_POST["id_htrans"])){
            $id = $_POST["id_htrans"];
            $sql = "SELECT d.nama_makanan, d.jumlah_makanan, m.harga_menu FROM dtrans_reservasi d, menu_makanan m, htrans_reservasi h WHERE d.id_htrans_reservasi='$id' AND d.id_htrans_reservasi=h.id_htrans_reservasi AND m.id_restoran=h.id_restoran AND d.nama_makanan=m.nama_menu";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $data = array();
                $arrVouch = array();
                $ctr = 0;
                while($row = mysqli_fetch_array($result2)) {
                    $data["nama_makanan"] = $row["nama_makanan"];
                    $data["jumlah_makanan"] = $row["jumlah_makanan"];
                    $data["harga_menu"] = $row["harga_menu"];
                    $arrVouch[$ctr] = $data;
                    $ctr++;
                }
                mysqli_free_result($result2);
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["datatransaksi"] = $arrVouch;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function setStatusTransaksi($conn){
        if(isset($_POST["id_htrans"])){
            $id = $_POST["id_htrans"];
            $sql_insert = "UPDATE htrans_reservasi SET status_pesanan='Dikonfirmasi' WHERE id_htrans_reservasi='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function requestPinjamFasilitas($conn){
        if (isset($_POST["id_htrans"]) && isset($_POST["nama_fasilitas"]) && isset($_POST["jumlah_faspin"]) && isset($_POST["id_fasilitas"])) {
            $id = (int)$_POST["id_htrans"];
            $fas = $_POST["nama_fasilitas"];
            $jmlh = (int)$_POST["jumlah_faspin"];
            $idfas = $_POST["id_fasilitas"];
            $sql_insert = "INSERT INTO fasilitas_yang_dipinjam(id_htrans_reservasi, nama_fasilitas, jumlah_faspin, id_fasilitas) VALUES ($id, '$fas', $jmlh, $idfas)";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function minusFasilitas($conn){
        if(isset($_POST["id_fasilitas"]) && isset($_POST["jumlah_fasilitas"])){
            $id = (int)$_POST["id_fasilitas"];
            $jmlh = $_POST["jumlah_fasilitas"];
            $sql_insert = "UPDATE fasilitas_restoran SET jumlah_fasilitas='$jmlh' WHERE id_fasilitas='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditProfileCustomer($conn){
        if(isset($_POST["id_customer"]) && isset($_POST["username"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["password"])){
            $id = $_POST["id_customer"];
            $username = $_POST["username"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql_insert = "UPDATE customer SET username_customer='$username', password_customer='$password', nama_customer='$nama', email_customer='$email' WHERE id_customer='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else if(isset($_POST["id_customer"]) && isset($_POST["username"]) && isset($_POST["nama"]) && isset($_POST["email"])){
            $id = $_POST["id_customer"];
            $username = $_POST["username"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $sql_insert = "UPDATE customer SET username_customer='$username', nama_customer='$nama', email_customer='$email' WHERE id_customer='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function DeleteAccountCustomer($conn){
        if(isset($_POST["id_customer"])){
            $id = $_POST["id_customer"];
            $sql_insert = "UPDATE customer SET status_customer='Tidak Aktif' WHERE id_customer='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Deleted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Delete Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function ClaimVoucher($conn){
        if(isset($_POST["kode_voucher"]) && $_POST["id_customer"]){
            $idvouch = $_POST["kode_voucher"];
            $idcust = $_POST["id_customer"];
            $sql_insert = "INSERT INTO claim_voucher(kode_voucher, id_customer) VALUES ('$idvouch' , '$idcust')";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Voucher Claimed!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Claim Voucher Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectHariJamBukaResto($conn){
        if(isset($_POST["id_restoran"])){
            $id = $_POST["id_restoran"];
            $sql = "SELECT hari_buka, jam_buka FROM hari_jam_buka_restoran WHERE id_restoran='$id'";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $data = array();
                $arrVouch = array();
                $ctr = 0;
                while($row = mysqli_fetch_array($result2)) {
                    $data["hari_buka"] = $row["hari_buka"];
                    $data["jam_buka"] = $row["jam_buka"];
                    $arrVouch[$ctr] = $data;
                    $ctr++;
                }
                mysqli_free_result($result2);
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["datajambuka"] = $arrVouch;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectVoucherYangDiclaim($conn){
        $sql = "SELECT kode_voucher, id_customer FROM claim_voucher";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["kode_voucher"] = $row["kode_voucher"];
                $data["id_customer"] = $row["id_customer"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["dataClaimVoucher"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function selectFasilitasYangDipinjam($conn){
        $sql = "SELECT id_htrans_reservasi, nama_fasilitas, jumlah_faspin, id_fasilitas FROM fasilitas_yang_dipinjam";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_htrans_reservasi"] = $row["id_htrans_reservasi"];
                $data["nama_fasilitas"] = $row["nama_fasilitas"];
                $data["jumlah_faspin"] = $row["jumlah_faspin"];
                $data["id_fasilitas"] = $row["id_fasilitas"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["dataFasPin"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function FilterHarga($conn){
        // if(isset($_POST["harga_min"]) && isset($_POST["harga_max"])){
        //     $min = (int)$_POST["harga_min"];
        //     $max = (int) $_POST["harga_max"];
        //     $sql = "SELECT id_restoran FROM menu_makanan WHERE harga_menu >= $min and harga_menu <= $max";
        //     $result2 = mysqli_query($conn, $sql);
        //     if (mysqli_num_rows($result2) > 0) {
        //         $data = array();
        //         $arrMenu = array();
        //         $ctr = 0;
        //         while($row = mysqli_fetch_array($result2)) {
        //             $data["id_restoran"] = $row["id_restoran"];
        //             $arrMenu[$ctr] = $data;
        //             $ctr++;
        //         }
        //         mysqli_free_result($result2);
        //         $response["code"] = 1;
        //         $response["message"] = "Get Data Successful";
        //         $response["datarestoran"] = $arrMenu;
        //     } else {
        //         $response["code"] = -3;
        //         $response["message"] = "No Data";
        //     }
        // }
        // else if(isset($_POST["harga_min"])){
        //     $min = (int)$_POST["harga_min"];
        //     $sql = "SELECT id_restoran FROM menu_makanan WHERE harga_menu > $min";
        //     $result2 = mysqli_query($conn, $sql);
        //     if (mysqli_num_rows($result2) > 0) {
        //         $data = array();
        //         $arrMenu = array();
        //         $ctr = 0;
        //         while($row = mysqli_fetch_array($result2)) {
        //             $data["id_restoran"] = $row["id_restoran"];
        //             $arrMenu[$ctr] = $data;
        //             $ctr++;
        //         }
        //         mysqli_free_result($result2);
        //         $response["code"] = 1;
        //         $response["message"] = "Get Data Successful";
        //         $response["datarestoran"] = $arrMenu;
        //     } else {
        //         $response["code"] = -3;
        //         $response["message"] = "No Data";
        //     }
        // }
        // else{
        //     $response["code"] = -2;
        //     $response["message"] = "Invalid Data";
        // }
        // echo json_encode($response);
        $sql = "SELECT harga_menu, id_restoran FROM menu_makanan";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["harga_menu"] = $row["harga_menu"];
                $data["id_restoran"] = $row["id_restoran"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["dataFilterHarga"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function MemprosesPesanan($conn){
        if(isset($_POST["id_htrans"])){
            $id = $_POST["id_htrans"];
            $sql_update = "UPDATE htrans_reservasi SET status_pesanan='Dikonfirmasi' WHERE id_htrans_reservasi='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function RescheduleTanggalReservasi($conn){
        if(isset($_POST["id_htrans"]) && isset($_POST["tanggal_reservasi"]) && isset($_POST["jam_reservasi"]) && isset($_POST["note_transaksi"])){
            $id = $_POST["id_htrans"];
            $tgl = $_POST["tanggal_reservasi"];
            $jam = $_POST["jam_reservasi"];
            $note = $_POST["note_transaksi"];
            $sql_update = "UPDATE htrans_reservasi SET tanggal_reservasi='$tgl', jam_reservasi='$jam', note_transaksi='$note' WHERE id_htrans_reservasi='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function BatalkanPesanan($conn){
        if(isset($_POST["id_htrans"])){
            $id = $_POST["id_htrans"];
            $sql_update = "UPDATE htrans_reservasi SET status_pesanan='Dibatalkan' WHERE id_htrans_reservasi='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditMenuMakanan($conn){
        if (isset($_POST["id_menu"]) && isset($_POST["nama_menu"]) && isset($_POST["kategori_menu"]) && isset($_POST["status_menu"]) && isset($_POST["deskripsi_menu"]) && isset($_POST["harga_menu"]) && isset($_POST["id_restoran"]) && isset($_POST["image"])) {
            $idmenu = $_POST["id_menu"];
            $nama = $_POST["nama_menu"];
            $kategori = $_POST["kategori_menu"];
            $status = $_POST["status_menu"];
            $deskripsi = $_POST["deskripsi_menu"];
            $harga = $_POST["harga_menu"];
            $id = $_POST["id_restoran"];
            $path = "imagesMenu/". str_replace(" ", "", $nama).$id.".jpg";
            $sql_insert = "UPDATE menu_makanan SET nama_menu='$nama', kategori_menu='$kategori', status_menu='$status', deskripsi_menu='$deskripsi', harga_menu='$harga' WHERE id_menu='$idmenu'";
            file_put_contents($path, base64_decode($_POST["image"]));
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function DeleteMenuMakanan($conn){
        if(isset($_POST["id_menu"])){
            $id = $_POST["id_menu"];
            $sql_update = "UPDATE menu_makanan SET status_menu='Tidak Aktif' WHERE id_menu='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Deleted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditFasilitas($conn){
        if (isset($_POST["id_fasilitas"]) && isset($_POST["nama_fasilitas"]) && isset($_POST["jumlah_fasilitas"]) && isset($_POST["status_fasilitas"])) {
            $idfas = $_POST["id_fasilitas"];
            $nama = $_POST["nama_fasilitas"];
            $jmlh = $_POST["jumlah_fasilitas"];
            $status = $_POST["status_fasilitas"];
            $sql_insert = "UPDATE fasilitas_restoran SET nama_fasilitas='$nama', jumlah_fasilitas='$jmlh', status_fasilitas='$status' WHERE id_fasilitas='$idfas'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function DeleteFasilitas($conn){
        if(isset($_POST["id_fasilitas"])){
            $id = $_POST["id_fasilitas"];
            $sql_update = "UPDATE fasilitas_restoran SET status_fasilitas='Tidak Aktif' WHERE id_fasilitas='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Deleted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditVoucher($conn){
        if (isset($_POST["kode_voucher"]) && isset($_POST["jenis_voucher"]) && isset($_POST["jenis_potongan"]) && isset($_POST["jumlah_diskon"]) && isset($_POST["kuota_voucher"]) && isset($_POST["minimum_pembelian"]) && isset($_POST["maksimal_potongan"]) && isset($_POST["tanggal_awal"]) && isset($_POST["tanggal_berakhir"]) && isset($_POST["image_banner"])) {
            $idvouch = $_POST["kode_voucher"];
            $jenisv = $_POST["jenis_voucher"];
            $jenisp = $_POST["jenis_potongan"];
            $jumlahdisc = $_POST["jumlah_diskon"];
            $kuota = $_POST["kuota_voucher"];
            $minim = $_POST["minimum_pembelian"];
            $maksimal = $_POST["maksimal_potongan"];
            $ta = $_POST["tanggal_awal"];
            $tb = $_POST["tanggal_berakhir"];
            $path = "imagesResto/"."Banner"."$idvouch".".jpg";
            file_put_contents($path, base64_decode($_POST["image_banner"]));
            $sql_insert = "UPDATE voucher_restoran SET jenis_voucher='$jenisv', jenis_potongan='$jenisp', jumlah_diskon='$jumlahdisc', kuota_voucher='$kuota', minimum_pembelian='$minim', maksimal_potongan='$maksimal', tanggal_awal='$ta', tanggal_berakhir='$tb' WHERE kode_voucher='$idvouch'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else if (isset($_POST["kode_voucher"]) && isset($_POST["jenis_voucher"]) && isset($_POST["jenis_potongan"]) && isset($_POST["jumlah_diskon"]) && isset($_POST["kuota_voucher"]) && isset($_POST["minimum_pembelian"]) && isset($_POST["maksimal_potongan"]) && isset($_POST["tanggal_awal"]) && isset($_POST["tanggal_berakhir"])) {
            $idvouch = $_POST["kode_voucher"];
            $jenisv = $_POST["jenis_voucher"];
            $jenisp = $_POST["jenis_potongan"];
            $jumlahdisc = $_POST["jumlah_diskon"];
            $kuota = $_POST["kuota_voucher"];
            $minim = $_POST["minimum_pembelian"];
            $maksimal = $_POST["maksimal_potongan"];
            $ta = $_POST["tanggal_awal"];
            $tb = $_POST["tanggal_berakhir"];
            $sql_insert = "UPDATE voucher_restoran SET jenis_voucher='$jenisv', jenis_potongan='$jenisp', jumlah_diskon='$jumlahdisc', kuota_voucher='$kuota', minimum_pembelian='$minim', maksimal_potongan='$maksimal', tanggal_awal='$ta', tanggal_berakhir='$tb' WHERE kode_voucher='$idvouch'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function DeleteVoucher($conn){
        if(isset($_POST["id_voucher"])){
            $id = $_POST["id_voucher"];
            $sql_update = "UPDATE voucher_restoran SET status_voucher='Tidak Aktif' WHERE id_voucher='$id'";
            $query2 = mysqli_query($conn, $sql_update);
            if ($query2) {
                $response["code"] = 1;
                $response["message"] = "Data Deleted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function HapusAccountRestoran($conn){
        if(isset($_POST["id_restoran"])){
            $id = $_POST["id_restoran"];
            $sql_insert = "UPDATE restoran SET status_restoran='Tidak Aktif' WHERE id_restoran='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Deleted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Delete Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditIdentitasRestoran($conn){
        if(isset($_POST["id_restoran"]) && isset($_POST["username"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["alamat"]) && isset($_POST["daerah"])){
            $id = $_POST["id_restoran"];
            $username = $_POST["username"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $alamat = $_POST["alamat"];
            $daerah = $_POST["daerah"];
            $sql_insert = "UPDATE restoran SET username_restoran='$username', password_restoran='$password', nama_restoran='$nama', email_restoran='$email', alamat_restoran='$alamat', daerah_restoran='$daerah' WHERE id_restoran='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else if(isset($_POST["id_restoran"]) && isset($_POST["username"]) && isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["alamat"]) && isset($_POST["daerah"])){
            $id = $_POST["id_restoran"];
            $username = $_POST["username"];
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $alamat = $_POST["alamat"];
            $daerah = $_POST["daerah"];
            $sql_insert = "UPDATE restoran SET username_restoran='$username', nama_restoran='$nama', email_restoran='$email', alamat_restoran='$alamat', daerah_restoran='$daerah' WHERE id_restoran='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function EditGambarDanHariJamBuka($conn){
        if (isset($_POST["id_restoran"]) && isset($_POST["nama"]) && isset($_POST["hari_buka"]) && isset($_POST["jam_buka"]) && isset($_POST["image_depan"]) && isset($_POST["image_dalam"]) && isset($_POST["image_ruangan"])) {
            $id = $_POST["id_restoran"];
            $nama = $_POST["nama"];
            $hari = $_POST["hari_buka"];
            $jam = $_POST["jam_buka"];
            $path = "imagesResto/". str_replace(" ", "", $nama)."BagianDepan".".jpg";
            file_put_contents($path, base64_decode($_POST["image_depan"]));
            $path2 = "imagesResto/". str_replace(" ", "", $nama)."BagianDalam".".jpg";
            file_put_contents($path2, base64_decode($_POST["image_dalam"]));
            $path3 = "imagesResto/". str_replace(" ", "", $nama)."BagianRuangan".".jpg";
            file_put_contents($path3, base64_decode($_POST["image_ruangan"]));
            $sql_insert = "UPDATE hari_jam_buka_restoran SET hari_buka='$hari', jam_buka='$jam' WHERE id_restoran='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Inserted!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Insert Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function MakananTerlaris($conn){
        if(isset($_POST["id_restoran"])){
            $id = $_POST["id_restoran"];
            $sql = "SELECT d.nama_makanan, d.jumlah_makanan FROM dtrans_reservasi d, htrans_reservasi h WHERE d.id_htrans_reservasi=h.id_htrans_reservasi AND h.id_restoran='$id' AND h.status_pesanan='Selesai'";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $data = array();
                $arrVouch = array();
                $ctr = 0;
                while($row = mysqli_fetch_array($result2)) {
                    $data["nama_makanan"] = $row["nama_makanan"];
                    $data["jumlah_makanan"] = $row["jumlah_makanan"];
                    $arrVouch[$ctr] = $data;
                    $ctr++;
                }
                mysqli_free_result($result2);
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["datatransaksi"] = $arrVouch;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function PelangganSetia($conn){
        if(isset($_POST["id_restoran"])){
            $id = $_POST["id_restoran"];
            $sql = "SELECT c.username_customer FROM customer c, htrans_reservasi h WHERE c.id_customer=h.id_customer AND h.id_restoran='$id' AND h.status_pesanan='Selesai'";
            $result2 = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result2) > 0) {
                $data = array();
                $arrVouch = array();
                $ctr = 0;
                while($row = mysqli_fetch_array($result2)) {
                    $data["username_customer"] = $row["username_customer"];
                    $arrVouch[$ctr] = $data;
                    $ctr++;
                }
                mysqli_free_result($result2);
                $response["code"] = 1;
                $response["message"] = "Get Data Successful";
                $response["datatransaksi"] = $arrVouch;
            } else {
                $response["code"] = -3;
                $response["message"] = "No Data";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function PesananSelesai($conn){
        if(isset($_POST["id_htrans"])){
            $id = $_POST["id_htrans"];
            $sql_insert = "UPDATE htrans_reservasi SET status_pesanan='Selesai' WHERE id_htrans_reservasi='$id'";
            $query = mysqli_query($conn, $sql_insert);
            if ($query) {
                $response["code"] = 1;
                $response["message"] = "Data Updated!";
            } else {
                $response["code"] = -3;
                $response["message"] = "Update Data Failed!";
            }
        } else {
            $response["code"] = -2;
            $response["message"] = "Invalid Data";
        }
        echo json_encode($response);
    }

    function selectRestoBerdasarkanHariJamBuka($conn){
        $sql = "SELECT id_restoran, hari_buka, jam_buka FROM hari_jam_buka_restoran";
        $result2 = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result2) > 0) {
            $data = array();
            $arrVouch = array();
            $ctr = 0;
            while($row = mysqli_fetch_array($result2)) {
                $data["id_restoran"] = $row["id_restoran"];
                $data["hari_buka"] = $row["hari_buka"];
                $data["jam_buka"] = $row["jam_buka"];
                $arrVouch[$ctr] = $data;
                $ctr++;
            }
            mysqli_free_result($result2);
            $response["code"] = 1;
            $response["message"] = "Get Data Successful";
            $response["datajambuka"] = $arrVouch;
        } else {
            $response["code"] = -3;
            $response["message"] = "No Data";
        }
        echo json_encode($response);
    }

    function CreatePaymentLink($conn){
        if(isset($_POST["id_htrans"]) && isset($_POST["total_harga"])){
            $q = base64_encode("SB-Mid-server-4qyA_1VhziYrr7oG4uiUHWGt".":");
            $vars = [
                'transaction_details' => [
                    'order_id' => $_POST["id_htrans"],
                    'gross_amount' => $_POST["total_harga"]
                ],
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,"https://api.sandbox.midtrans.com/v1/payment-links");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($vars));  //Post Fields
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json',
                'Authorization: Basic ' . $q
            ];
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $server_output = curl_exec ($ch);
            curl_close ($ch);
            // print_r(json_decode($server_output, true)['payment_url']);
            $response["message"] = json_decode($server_output, true)['payment_url'];
        }
        echo json_encode($response);
    }

    function GetMidtransResponseCode($conn){
        if(isset($_POST["order_id"])){
            $q = base64_encode("SB-Mid-server-4qyA_1VhziYrr7oG4uiUHWGt".":");
            // $vars = [
            //     'transaction_status' => [
            //         'order_id' => $_POST["order_id"]
            //     ],
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL,"https://api.sandbox.midtrans.com/v2/".$_POST["order_id"]."/status");
            // curl_setopt($ch, CURLOPT_POST, 1);
            // // curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($vars));  //Post Fields
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $headers = [
            //     'Accept: application/json',
            //     'Content-Type: application/json',
            //     'Authorization: Basic ' . $q
            // ];
            // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            // $server_output = curl_exec ($ch);
            // curl_close ($ch);
            // // print_r(json_decode($server_output, true)['payment_url']);
            // $response["message"] = json_decode($server_output, true)['status_code'];

            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/".$_POST["order_id"]."/status",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                'Content-Type: application/json',
                'Authorization: Basic ' . $q
            ],
            ]);

            $response = curl_exec($curl);
            // $err = curl_error($curl);

            curl_close($curl);
            // if ($err) {
            // echo "cURL Error #:" . $err;
            // } else {
                $responsee["message"] = json_decode($response, true)['status_code'];
            // }
        }
        echo json_encode($responsee);
    }