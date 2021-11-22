<div class="modal fade" id="formBarangModal" tabindex="-1" aria-labelledby="formBarangModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formBarangModalLabel">Form Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Qty</label>
                <input type="number" class="form-control" name="qty">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="save_data()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script>
    function save_data(){
        const body = {
            nama_barang:document.getElementsByName('nama_barang')[0].value,
            harga_jual:document.getElementsByName('harga_jual')[0].value,
            harga_beli:document.getElementsByName('harga_beli')[0].value,
            qty:document.getElementsByName('qty')[0].value,
        }

        fetch('<?php echo site_url('admin/barang'); ?>',{
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            body:JSON.stringify(body)
        })
            .then(response => response.json())
            .then(commits => {
                alert(commits.message);
                window.location.reload(false);
            });
    }
</script>