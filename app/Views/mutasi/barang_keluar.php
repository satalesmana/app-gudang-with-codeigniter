<?php //echo "<pre>",print_r($users), "</pre>"; ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi - Mutasi barang keluar</h1>
</div>

<form action="<?php echo site_url('register'); ?>" method="POST">
    <div class="mb-3 row">
        <label class="col-sm-2 form-label">Petugas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="petugas" readonly
                value="<?php echo $user_login['nama_pengguna'].' ('.$user_login['username'].')' ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 form-label">User Request</label>
        <div class="col-sm-10">
            <select name="user_request" class="form-control">
                <option value="0">--Pilihan--</option>
                <?php foreach($users as $row){ ?>
                    <option value="<?php echo $row['email']; ?>"> <?php echo $row['namaPengguna']; ?> </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 form-label">Item Keluar</label>
        
        <div class="col-sm-10">
            <select name="user_request" class="form-control">
                <option value="0">--Pilihan--</option>
                <?php foreach($barang as $row){ ?>
                    <option value="<?php echo $row['id']; ?>"> <?php echo $row['nama_barang']; ?> </option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 form-label">Qty</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="qty" >
        </div>
    </div>

    <div class="mb-3 row">
        <label class="form-label col-sm-2"> &nbsp; </label>
        <div class="col-sm-10">
            <button type="button" class="btn btn-primary mb-3">Add</button>
            <button type="submit" class="btn btn-primary mb-3">Save</button>
        </div>
    </div>

    <div class="mb-3 row">
        <label class="col-sm-2 form-label">&nbsp; </label>
        <div class="col-sm-10">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Buku</td>
                        <td>1</td>
                        <td> Delete </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Komputer</td>
                        <td>1</td>
                        <td> Delete </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</form>