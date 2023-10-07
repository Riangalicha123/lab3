<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between">
                <h2 class="fw-bold mb-0">Fruits</h2>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#saveProductModal">
                    Add New Product
                </button>
            </div>
            <table class="table table-hover my-0 text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Fruits Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product):?>
                        <tr style="height: 200px">
                            <td>
                                <img style="width: 200px;" src="<?=base_url('/uploads/'.$product['image']);?>" alt="<?=$product['fruitName']?>" srcset="">
                            </td>
                            <td class="fw-bold"><?=$product['fruitName']?></td>
                            <td style="width: 400px;"><?=$product['fruitDescription']?></td>
                            <td>₱<?=$product['fruitPrice']?></td>
                            <td><?=$product['stockQuantity']?></td>
                            <td>
                                <a href="/editProd/<?=$product['fruitID']?>" class="btn btn-primary">Edit</a>
                                <a href="/deleteProd/<?=$product['fruitID']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
