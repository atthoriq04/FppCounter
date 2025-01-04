<div class="modal fade" id="counterModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <!-- modal content -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Register A new Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- modal Body -->
            <div class="modal-body">
                <form action="" method="POST" id="addCounter">
                    <div class="row mx-1 form-floating mb-3">
                        <select class="form-select form-select-sm" name="year" aria-label="Small select example" id="year">
                            <option selected value="<?= date("Y") ?>"><?= date("Y") ?></option>
                        </select>
                        <label for="year">Year</label>
                    </div>
                    <div class="row mx-1 form-floating mb-3">
                        <input type="text" class="form-control" id="searchName" placeholder="name@example.com" autocomplete="off">
                        <label for="searchName">Search Name</label>
                    </div>
                    <div class="row mx-1" id=selector>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeAddModal" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="toEditData" data-bs-toggle="modal" data-bs-target="#addNewModal" disabled>Submit</button>
            </div>
            <!-- end of modal -->
        </div>
    </div>
</div>