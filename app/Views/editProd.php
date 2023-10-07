<?php include 'Admins/include/head.php'?>
<body>
    <div class="wrapper">
        <?php include 'Admins/include/sidebar.php'?>
        <div class="main">
            <?php include 'Admins/include/header.php'?>
            
            <main class="content">
                <div class="row">
                    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
                        <div class="card flex-fill">
                            <form action="updateProd" method="post">
                            <!-- single product -->
                            <div class="single-product mt-5 mb-5">
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="product-item">
                                                <img class="img-fluid" src="<?=base_url('/uploads/'.$selectedProduct['image'])?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="single-product-content">
                                                <input type="hidden" name="fruitID" id="fruitID" value="<?=$selectedProduct['fruitID']?>">
                                                <!-- Fruit Name -->
                                                <div class="form-group my-2">
                                                    <label for="fruitName" class="fs-3">Fruit Name:</label>
                                                    <input type="text" class="form-control" id="fruitName" name="fruitName" value="<?=$selectedProduct['fruitName']?>" required>
                                                </div>

                                                <div class="form-group my-3">
                                                    <label for="fruitDescription" class="fs-4">Fruit Description:</label>
                                                    <textarea class="form-control" id="fruitDescription" name="fruitDescription" rows="5" required><?= htmlspecialchars($selectedProduct['fruitDescription']) ?></textarea>
                                                </div>
                                                <!-- Fruit Price -->
                                                <div class="form-group my-3">
                                                    <label for="fruitPrice" class="fs-4">Fruit Price (PHP):</label>
                                                    <input type="number" class="form-control" id="fruitPrice" name="fruitPrice" value="<?=$selectedProduct['fruitPrice']?>" required>
                                                </div>

                                                <!-- Fruit Quantity -->
                                                <div class="form-group my-3">
                                                    <label for="fruitQuantity" class="fs-4">Fruit Quantity:</label>
                                                    <input type="number" class="form-control" id="fruitQuantity" name="fruitQuantity" value="<?=$selectedProduct['fruitQuantity']?>" required>
                                                </div>
                                                
                                                <input type="submit" class="btn btn-primary" value="Save"/>
                                                <a href="/products" class="btn btn-outline-secondary">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end single product -->
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    
    </div>

    <?php include 'Admins/include/scripts.php'?>
</body>
</html>