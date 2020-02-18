<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/website.css">
    <title>Out Book </title>
  </head>
  <body>

    <section class="top-navbar">
      <div class="container">


  <nav class="navbar navbar-expand-lg bg-light ">
  <a class="navbar-brand" href="#"> <img src="<?php echo base_url(); ?>assets/images/bigbasket-logo.png" alt=""> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link " href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Demo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Downloads</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Contact Us</a>
      </li>

    </ul>
  </div>
</nav>
  </div>
    </section>


    <section class="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/slider/banner1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/slider/banner2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/slider/banner3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </section>

    <section class="middle-page">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <img class="fast-img" src="<?php echo base_url(); ?>assets/images/slider/bottm_banner.jpg"  width="100%" alt="">
          </div>
          <div class="row btn-div w-100">
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">Eggs Meat & Fish</button>
            </div>
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">Home & Kitchen</button>
            </div>
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">GoodDiet</button>
            </div>
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">Beauty Store</button>
            </div>
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">BB Star </button>
            </div>
            <div class="col-md-2">
            <button class="btn menu-btn btn-primary" type="submit">Deals Of week</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="product-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3 class="text-center ">My Smart Basket</h3>
          </div>
        <div class="col-md-3">
          <div class="product-cart">
            <div class="card" style="width: 100%;">
              <div class="discount">
                <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
              </div>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/basamati.jpg" alt="Card image cap">
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

        <div class="col-md-3">
          <div class="product-cart">
            <div class="card" style="width: 100%;">
              <div class="discount">
                <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
              </div>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/tomato.jpg" alt="Card image cap">
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
        <div class="col-md-3">
          <div class="product-cart">
            <div class="card" style="width: 100%;">
              <div class="discount">
                <p class="f-12 text-danger mb-0"> 20% Off  <img class="discount-small" src="<?php echo base_url(); ?>assets/images/discount.png" alt=""> </p>
              </div>
                <img class="card-img-top" src="<?php echo base_url(); ?>assets/images/product/capsicum.jpg" alt="Card image cap">
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
        <div class="col-md-3">
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
  </section>

  <section class="frouts">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
              <h3 class="text-center">Fruits & Vegetables</h3>
        </div>

        <div class="col-md-6">
          <img class="big-img" src="<?php echo base_url(); ?>assets/images/frouts.jpg" alt="" width="100%">
        </div>
        <div class="col-md-6 mb-5">
          <div class="row">
            <div class="col-md-6">
              <img class="small-img mb-3" src="<?php echo base_url(); ?>assets/images/frouts2.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img" src="<?php echo base_url(); ?>assets/images/frouts3.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img mb-3" src="<?php echo base_url(); ?>assets/images/frouts2.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img" src="<?php echo base_url(); ?>assets/images/frouts3.jpg" alt="" width="100%" >
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-12 mb-3">
              <h3 class="text-center">Fruits & Vegetables</h3>
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/atta.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/rice.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/dal.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/masala.jpg" alt="" width="100%" >
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mb-3">
              <h3 class="text-center">Cleaning and Household</h3>
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/tide.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/ezzey.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/garbage.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-3">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/clener.jpg" alt="" width="100%" >
        </div>
      </div>

      <div class="row mt-5">
        <div class="col-md-12">
              <h3 class="text-center">Fruits & Vegetables</h3>
        </div>
        <div class="col-md-6">
          <img class="big-img" src="<?php echo base_url(); ?>assets/images/frouts.jpg" alt="" width="100%">
        </div>
        <div class="col-md-6 mb-5">
          <div class="row">
            <div class="col-md-6">
              <img class="small-img mb-3" src="<?php echo base_url(); ?>assets/images/frouts2.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img" src="<?php echo base_url(); ?>assets/images/frouts3.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img mb-3" src="<?php echo base_url(); ?>assets/images/frouts2.jpg" alt="" width="100%" >
            </div>
            <div class="col-md-6">
              <img class="small-img" src="<?php echo base_url(); ?>assets/images/frouts3.jpg" alt="" width="100%" >
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12 mb-3">
              <h3 class="text-center">Brand Store</h3>
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/patanjali.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/durex.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/parle.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/cola.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/parle.jpg" alt="" width="100%" >
        </div>
        <div class="col-md-2">
          <img class="small-img" src="<?php echo base_url(); ?>assets/images/product/cola.jpg" alt="" width="100%" >
        </div>
      </div>
    </div>
  </section>

  <section class="bottom-slider">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="text-center pb-4">Featured Recipes</h3>
        </div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/product/chocolate.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/product/award.jpg" alt="Second slide">
    </div>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>Grocery</h6>
          <ul>
            <li>About Us</li>
            <li>Terms and Conditions</li>
            <li>Careers At bigbasket</li>
            <li>Privacy Policy</li>
          </ul>
        </div>

        <div class="col-md-3">
          <h6>Help</h6>
          <ul>
            <li>FAQs</li>
            <li>Contact Us</li>
            <li>Vendor Connect</li>
            <li>Terms</li>
          </ul>
        </div>

        <div class="col-md-3">
            <h6>Download Our App</h6>
            <img class="pb-3" src="<?php echo base_url(); ?>assets/images/product/play.png" alt="" width="50%">
            <br>
              <img src="<?php echo base_url(); ?>assets/images/product/apple.png" alt="" width="50%">
        </div>

        <div class="col-md-3">
          <h6>Get Social With Us</h6>
          <ul>
            <li>About Us</li>
            <li>Terms and Conditions</li>
            <li>Careers At bigbasket</li>
            <li>Privacy Policy</li>
          </ul>
        </div>
      </div>
    </div>
  </footer>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
