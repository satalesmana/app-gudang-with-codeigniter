<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Data - Barang</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        <button type="button" onClick="add_new()" class="btn btn-sm btn-outline-secondary">Add New</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
        </button>
    </div>
</div>

<table class="table tbl-border">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Qty</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($barang as $index=>$row){ ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo number_format($row['harga_jual']); ?></td>
            <td><?php echo number_format($row['harga_beli']); ?></td>
            <td><?php echo $row['qty']; ?></td>
            <td>
                <button class="btn btn-sm btn-outline-primary">Edit</button>
                <button class="btn btn-sm btn-outline-danger" onclick="deleteBarang(<?php echo $row['id']; ?>)">Delete</button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?= $this->include('barang/form_barang'); ?>

<script>
    function deleteBarang(id){
        showLoading()
        fetch('<?php echo site_url('admin/barang'); ?>/'+id,{
            method: 'DELETE',
        })
            .then(response => response.json())
            .then(commits => {
                hideLoading()
                alert(commits.message);
                window.location.reload(false);
            });
    }

    function add_new(){
        var formBarang = new bootstrap.Modal(document.getElementById('formBarangModal'), {
                keyboard: false
            });

        this.clearForm()
        formBarang.toggle();
    }

    function clearForm(){
        document.getElementsByName('nama_barang')[0].value='';
        document.getElementsByName('harga_jual')[0].value='';
        document.getElementsByName('harga_beli')[0].value='';
        document.getElementsByName('qty')[0].value='';
    }
</script>