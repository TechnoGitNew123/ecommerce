<?php include ('header.php'); ?>

<section class="gorcery-list">
  <div class="container-fluid">

    <div class="row">

      <div class="col-md-4">
          <div class="card p-30">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">Search</button>
                </div>
              </div>
          </div>

          <br><br>

          <div class="card p-30">
            <h4> Product Category</h4>
            <ul>
              <li>Fruits</li>
              <li>Vegetables</li>
              <li> Groceries
                <ul>
                  <li>Dry Fruits</li>
                  <li>Edible Oil</li>
                  <li>Egg</li>
                  <li>Flours & Grains</li>
                </ul>


              </li>
            </ul>
          </div>

          <br><br>
          <div class="card p-30">
            <h4> Product Category</h4>

          </div>

      </div>

      <div class="col-md-8">
          <div class="card right-card">
            <div class="row ml-3">
              <nav aria-label="breadcrumb ">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Grocery </li>
                  </ol>
                </nav>
                <div class="col-md-12">
                    <h1 class="heading" >Edible Oil</h1>
                </div>
                <div class="col-md-6 pb-5">
                  Showing all 11 results
                </div>
                <div class="col-md-6 text-right pr-5">
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                </div>

            </div>
        <div class="row">
          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>

        </div>

        <br><br><br>

        <div class="row">
          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="product-cart">
              <div class="card" style="width: 100%;">
                <div class="discount">
                  <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
                </div>
                  <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/potato.jpg" alt="Card image cap">
                  <div class="card-body">
                  <a href="#">  <h5 class="card-title text-center">Basmati Rice - Feast Rozzana</h5></a>
                  <div class="form-group w-100 select_xsm">
                    <select class="form-control select2 " name="main_category_id" id="main_category_id" data-placeholder="Select Main Category">
                      <option value="">5 Kg pouch - Rs. 385.10 </option>
                      <option value="-1">1 Kg pouch - Rs. 85.10</option>
                    </select>
                  </div>
                  <div class="footer-card">
                    <p class="card-text "><span class="f-12 "> MRP:Rs <span class="line-throw">485</span>  </span> <span class="f-14">Rs 344.85</span> </p>
                    <p class="card-text f-14">Express Delivery: Today 2:30PM - 4:30PM</p>
                  </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
  </div>
</section>

<?php include ('footer.php'); ?>
