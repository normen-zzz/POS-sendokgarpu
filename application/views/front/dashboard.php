<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sendok Garpu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="<?= base_url('assets/front') ?>/css/style.css" />
</head>

<body>
  

  <!-- Body -->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-10">
              <form class="d-flex bg-secondary-subtle py-2" role="search">
                <div>
                  <p class="small">Order # <span class="h4">53</span></p>
                </div>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">
                  Table
                </button>
              </form>
              <div class="pt-4 overflow-y-scroll" style="height: 50vh">
                <table class="table" style="width:100%">
                  <tbody>
                    <tr>
                      <td style="width:60%">Item</td>

                      <td style="text-align: right">Qty</td>
                      <td style="text-align: right">Price <button class="btn" style="color:white">edit</button>
                        <button class="btn" style="color:white">X</button>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:60%">W3. Mie Goreng</td>

                      <td style="text-align: right">2</td>
                      <td style="text-align: right">$17.95 <button class="btn btn-secondary">edit</button>
                        <button class="btn btn-danger">X</button>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:60%">W1. Nasi Goreng</td>

                      <td style="text-align: right">4</td>
                      <td style="text-align: right">$17.95 <button class="btn btn-secondary">edit</button>
                        <button class="btn btn-danger">X</button>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:60%">Ice Tea</td>

                      <td style="text-align: right">6</td>
                      <td style="text-align: right">$5.00 <button class="btn btn-secondary">edit</button>
                        <button class="btn btn-danger">X</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-2 text-center bg p-0">
              <div class="menu">
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:10px;margin-bottom:5px;">
                  Nasi Padang
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Today's Special
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Entree
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Rijsttafel
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Street Food
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Rice Dishes
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Wok
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Soup
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Mains
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Sides
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Sambal
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Extras
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Drinks & Dessert
                </button>
                <button class="btn btn-outline-secondary w-100" type="submit" style="height:60px;margin-top:5px;margin-bottom:5px;">
                  Warkop
                </button>
              </div>
              <div></div>
            </div>
          </div>
          <div class="row">
            <div class="col-6 bg-light fixed-bottom">
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="col">DISCOUNT</th>
                    <td scope="col" colspan="3">-</td>
                  </tr>
                  <tr>
                    <th scope="col">SUBTOTAL</th>
                    <td scope="col">$38.90</td>
                    <th scope="col" class="text-end h4">Total</th>
                  </tr>
                  <tr>
                    <th scope="col">TAX</th>
                    <td scope="col">10% + Student Disc.</td>
                    <td scope="col" class="text-success h3 fw-bold text-end">
                      $42.79
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <button class="btn btn-outline-dark w-100">
                        CLEAR
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-outline-dark w-100">
                        SEND
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-outline-dark w-100">
                        DISCOUNT
                      </button>
                    </td>
                    <td>
                      <button class="btn btn-success w-100">PAY</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-md-6 pt-3 overflow-scroll" style="height: 95vh">
          <div class="row menu-harga">
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/1.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W1. Nasi Goreng</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/2.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W2. Mie Aceh Gor/ Reb</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/3.jpeg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W3. Mie Goreng</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/4.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W4. Kwetiau Goreng</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/1.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W1. Nasi Goreng</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/2.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W2. Mie Aceh Gor/ Reb</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/3.jpeg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W3. Mie Goreng</a>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card text-center border-2 my-2">
                <img src="<?= base_url('assets/front') ?>/image/4.jpg" class="card-img-top" style="padding: 5px;" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link">W4. Kwetiau Goreng</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  