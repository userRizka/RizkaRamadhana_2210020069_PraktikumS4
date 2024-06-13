<?php
include "database/connection.php";

// Mengaktifkan mode pengecualian untuk koneksi MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<div class="row">
    <div class="col">                                
        <h3>Bagian</h3>
    </div>
    <div class="col">
        <a href="?page=bagiantambah" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
    </div>
</div>
<div class="row mt-3">
    <div class="col">
    <?php
        try {
            $selectSQL = "SELECT * FROM bagian"; 
            $result = mysqli_query($connection, $selectSQL);
            if (mysqli_num_rows($result) == 0) {
                ?>
                <div class="alert alert-light" role="alert">
                    Data Kosong
                </div>
                <?php
            } else {
                ?>
                <table class="table bg-white rounded shadow-sm table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Bagian</th>
                            <th scope="col" width="200">Opsi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="align-middle">
                                <td>
                                    <?php echo $no++ ?>
                                </td>
                                <td>
                                    <?php echo $row["nama"] ?>
                                </td>
                                <td>
                                    <a href="?page=bagianubah&id=<?php echo $row["id"] ?>" class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                        Ubah
                                    </a>
                                    <a href="?page=bagianhapus&id=<?php echo $row["id"] ?>"
                                        onclick="javascript: return confirm('Konfirmasi data akan dihapus?');"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
        } catch (mysqli_sql_exception $e) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $e->getMessage(); ?>
            </div>
            <?php
        }
    ?>
    </div>
</div>
