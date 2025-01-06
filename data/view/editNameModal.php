<div class="modal fade" id="editNameModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add New</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-md-8 m-auto">
                        <form action="../data/functions/crud.php" method="POST" id="uploadForm" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="editName" id="editName">
                                <label for="editName">Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="Category" name="Category" aria-label="Floating label select example">
                                    <option value="0" id="editCategory">select Catesgory</option>

                                </select>
                                <label for="Category">Category</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="editSubcat" name="editSubcat" aria-label="Floating label select example">
                                    <option value="0">sub Category</option>

                                </select>
                                <label for="editSubcat">Select The Sub Category</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Input An Image</label>
                                <input class="form-control" type="file" name="image" id="imageInput" accept="image/*">
                            </div>
                            <div class="mb-3" id="cropContainer" style="display: none;">
                                <img id="imagePreview" alt="Preview" class="img-thumbnail" style="max-width: 100%; display: block;">
                            </div>
                            <button type="button" id="cropBtn" class="btn btn-secondary" style="display: none;">Crop Image</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="editButton">Submit</button>
            </div>
        </div>
    </div>
</div>