<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>
    <link rel="stylesheet" href="<?=base_url('bootstrap.min.css')?>">
    <link rel="stylesheet"href="<?=base_url('style.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">HappyCraft.idn</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/produk">Our Item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/register">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/pelanggan">Pelanggan</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="/login">Log Out</a>
              </li> 
            </ul>
            <form class="d-flex" role="search">
            <input class="px-2 search" type="search" placeholder="Search Product" aria-label="Search">
              <button class="btn0" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <section class="new">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-7 m-auto">
                    <div class="row">
                        <div class="col-lg-4">
                            <h1>The Brand</h1>
                        </br>
                           <img src="./brand.jpeg" alt="" class="img-luid">
                    </div>
                </div>
            </div>
        </div>
      </section>
      <section class="product">
        <div class="container py-5">
          <div class="row py-5">
            <div class="col-lg-5 m-auto text-center">
              <h1>Our Product</h1>
              <h6 style="color: chocolate;">In This Store</h6>
            </br>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 text-center">
              <div class="card border-0 bg-light">
                <div class="card-body">
                  <img src="Balmain.jpeg" alt="" class="img-fluid">
                </div>
              </div>
              <h6>Balenciaga Jacket</h6>
            </div>
            <div class="col-lg-3 text-center">
              <div class="card border-0 bg-light">
                <div class="card-body">
                  <img src="Channelw.jpeg" alt="" class="img-fluid">
                </div>
              </div>
              <h6>Chanel Jacket</h6>
            </div>
            <div class="col-lg-3 text-center">
              <div class="card border-0 bg-light">
                <div class="card-body">
                  <img src="Channel (1).jpeg" alt="" class="img-fluid">
                </div>
              </div>
              <h6>Sweater</h6>
            </div>
            <div class="col-lg-3 text-center">
              <div class="card border-0 bg-light">
                <div class="card-body">
                  <img src="LV.jpeg" alt="" class="img-fluid">
                </div>
              </div>
              <h6>Louis Viutton</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 text-center">
            <div class="card border-0 bg-light">
              <div class="card-body">
                <img src="fndi.jpeg" alt="" class="img-fluid">
              </div>
            </div>
            <h6>Fendi</h6>
          </div>
          <div class="col-lg-3 text-center">
            <div class="card border-0 bg-light">
              <div class="card-body">
                <img src="Fendi.jpeg" alt="" class="img-fluid">
              </div>
            </div>
            <h6>Gucci Jacket</h6>
          </div>
          <div class="col-lg-3 text-center">
            <div class="card border-0 bg-light">
              <div class="card-body">
                <img src="Louis.jpeg" alt="" class="img-fluid">
              </div>
            </div>
            <h6>LV Aesthetic Sweater</h6>
          </div>
          <div class="col-lg-3 text-center">
            <div class="card border-0 bg-light">
              <div class="card-body">
                <img src="lviu.jpeg" alt="" class="img-fluid">
              </div>
            </div>
            <h6>LV vest</h6>
        </div>
      </div>
      </div>
          </div>
        </div>
      </section>
      <section class="utama">
      <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-7 m-auto">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card-body">
<?=$this->renderSection('content')?>
</div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      </section>
      <section class="end">
        <div class="container py-5">
            <div class="row py-4">
                <div class="col-lg-7 m-auto text-center">
                    <div class="row">
                    
                </div>
            </div>
        </div>
      </section>
   
      <link rel="stylesheet" href="<?=base_url('bootstrap.bundle.min.js')?>">
</body>
</html>