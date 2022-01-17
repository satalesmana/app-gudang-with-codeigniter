<?php //echo "<pre>",print_r($users), "</pre>"; ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi - Mutasi barang keluar</h1>
</div>

<form method="POST">
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
            <select id="item_keluar" name="user_request" class="form-control">
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
            <input type="number" id="qty" class="form-control" name="qty" >
        </div>
    </div>

    <div class="mb-3 row">
        <label class="form-label col-sm-2"> &nbsp; </label>
        <div class="col-sm-10">
            <button type="button" onclick="add_item()" class="btn btn-primary mb-3">Add</button>
            <button type="button" onclick="save_data()" class="btn btn-primary mb-3">Save</button>
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
                <tbody id="tbl_item_data">
                </tbody>
            </table>
        </div>
    </div>

</form>

<script>
    let row_intem = [];
    function add_item(){
        const itemKeluar_form = document.getElementById("item_keluar");
        const qty_form = document.getElementById("qty");

        console.log("itemKeluar_form",itemKeluar_form.value)
        console.log("itemKeluar_form_text",itemKeluar_form.options[itemKeluar_form.selectedIndex].text)
        console.log("qty_form",qty_form.value)

        row_intem.push({
            id_barang:itemKeluar_form.value,
            nama_barang: itemKeluar_form.options[itemKeluar_form.selectedIndex].text,
            qty:qty_form.value
        })

        set_list_data();
        reset_form_item();
    }

    function set_list_data(){
        var el_row_tbl = document.getElementById("tbl_item_data")
        let row_item_html ='';
        for(let i=0; i< row_intem.length; i++){
            let no = parseInt(i) + parseInt(1);

            row_item_html += "<tr>";
            row_item_html += "<th scope='row'>"+ no +"</th>";
            row_item_html += "<td>"+row_intem[i].nama_barang+"</td>";
            row_item_html += "<td>"+row_intem[i].qty+"</td>";
            row_item_html += "<td>Delete</td>";
            row_item_html += "</tr>";
        }

        el_row_tbl.innerHTML = row_item_html;

        console.log('list_item',row_intem)
    }

    function reset_form_item(){
        document.getElementById("item_keluar").value = 0;
        document.getElementById("qty").value="";
    }

    function save_data(){
        const body = {
            id_petugas:document.getElementsByName('petugas')[0].value,
            user_request:document.getElementsByName('user_request')[0].value,
            item_data: row_intem
        }
        

        fetch('<?php echo site_url('admin/mutasi'); ?>',{
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