<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <!-- modal content -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Category Name</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- modal Body -->
            <div class="modal-body">
                <div class="row mx-1">
                    <h5 class="text-center my-2"> Subcategory List</h5>
                    <ul class="list-group">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="" data-bs-toggle="modal" data-bs-target="#addNewModal" data-type="subcategory"> Add new Sub Category </a></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="toEditData" data-bs-toggle="modal" data-bs-target="#addNewModal">Submit</button>
            </div>
            <!-- end of modal -->
        </div>
    </div>
</div>