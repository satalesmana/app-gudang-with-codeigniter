<?php //echo "<pre>",print_r($users), "</pre>"; ?>

<form action="<?php echo site_url('register'); ?>" method="POST">
    <div class="mb-3">
        <label class="form-label">Petugas</label>
        <input type="text" class="form-control" name="petugas" readonly
            value="<?php echo $user_login['nama_pengguna'].' ('.$user_login['username'].')' ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">User Request</label>
        <select name="user_request" class="form-control">
            <option value="0">--Pilihan--</option>
            <?php foreach($users as $row){ ?>
                <option value="<?php echo $row['email']; ?>"> <?php echo $row['namaPengguna']; ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Item Keluar</label>
        <select name="user_request" class="form-control">
            <option value="0">--Pilihan--</option>
            <?php foreach($barang as $row){ ?>
                <option value="<?php echo $row['id']; ?>"> <?php echo $row['nama_barang']; ?> </option>
            <?php } ?>
        </select>
    </div>
</form>