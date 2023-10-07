<!-- Modal -->
<div class="modal fade" id="saveProductModal" tabindex="-1" aria-labelledby="AddProdModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/saveProduct" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-3 fw-bold" id="EditProdModalLabel">Add Fruit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Fruit Name -->
                <div class="form-group">
                    <label for="fruitName">Fruit Name:</label>
                    <input type="text" class="form-control" id="fruitName" name="fruitName" required>
                </div>

                <!-- Fruit Description -->
                <div class="form-group my-2">
                    <label for="fruitDescription">Fruit Description:</label>
                    <textarea class="form-control" id="fruitDescription" name="fruitDescription" rows="3" required></textarea>
                </div>

                <!-- Fruit Price -->
                <div class="form-group my-2">
                    <label for="fruitPrice">Fruit Price (PHP):</label>
                    <input type="number" class="form-control" id="fruitPrice" name="fruitPrice" required>
                </div>

                <!-- Fruit Quantity -->
                <div class="form-group my-2">
                    <label for="fruitQuantity">Fruit Quantity:</label>
                    <input type="number" class="form-control" id="fruitQuantity" name="fruitQuantity" required>
                </div>

                <!-- Image -->
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputImage" id="image" name="image" accept="image/*" required>
                    <label class="input-group-text" for="image">Upload</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" value="Save"/>
            </div>
        </div>
        </form>
    </div>
</div>