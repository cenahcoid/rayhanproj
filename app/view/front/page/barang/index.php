<div class="container">
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#editm">Add new ++</button>
            <table id="data" class="table align-items-center mb-0">
                <thead>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Item Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Expired Date</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price Per Unit</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($items as $item) {
                    ?>
                        <td><?= $item->id ?></td>
                        <td style="font-family: 'Libre Barcode 39 Extended Text', cursive; font-size : 30px"><?= $item->code ?></td>
                        <td><?= $item->name ?></td>
                        <td><?= $item->qty ?></td>
                        <td><?= $item->unit ?></td>
                        <td><?= $item->expired_date ?></td>
                        <td><?= $item->price_per_unit ?></td>
                        <td>
                            <a class="badge bg-warning" style="cursor : pointer">Edit</a>
                            <a class="badge bg-danger" style="cursor : pointer">Delete</a>
                        </td>

                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content container py-3">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="froms">
                    <div class="row">
                        <div class="col-sm-6">
                            <form id="froms">
                                <label>Item Name</label>
                                <input class="form-control mb-2" type="search" id="first_name" name="" placeholder="Item.." required>
                                <label>Last Name</label>
                                <input class="form-control mb-2" type="search" id="last_name" name="last_name" placeholder="Last Name" required>
                                <label>Birth date</label>
                                <input class="form-control mb-2" type="date" id="birth" name="birth" required>
                                <label>Grade</label>
                                <select class="form-control mb-2" id="grade" name="grade" required>
                                    <?php
                                    for ($i = 1; $i <= 12; $i++) {
                                        echo "<option value=\"$i\">$i</option>";
                                    }
                                    echo "<option value=\"Non-formal education\">Non-formal education</option>";
                                    ?>
                                </select>
                                <label>WhatsApp</label>
                                <input class="form-control mb-4" type="search" id="phone" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="col-sm-6">
                            <label>Gender</label><br>
                            <input class="" type="radio" name="gender" id="male" value="male" required>Male
                            <input class="" type="radio" name="gender" id="female" value="female" required>Female<br><br>
                            <label>Address</label>
                            <textarea class="form-control mb-2" id="address" name="address"></textarea>
                            <label>Descriptions</label>
                            <textarea class="form-control mb-2" style="height : 187px" name="descriptions" id="descriptions"></textarea>
                            <input type="hidden" id="id" name="id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit" onclick="editStudents()" data-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src='../vendor/DataTables/datatables.min.js'></script>
<script>
    $('#data').DataTable({
        dom: 'B<"mt-2"l>frtip',
        buttons: [{
                extend: 'print',
                exportOptions: {
                    columns: ':visible:not(:last-child)' // Exclude last column from print
                }
            },
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible:not(:last-child)' // Exclude last column from print
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible:not(:last-child)' // Exclude last column from print
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible:not(:last-child)' // Exclude last column from print
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible:not(:last-child)' // Exclude last column from print
                }
            }
        ]
    });
</script>