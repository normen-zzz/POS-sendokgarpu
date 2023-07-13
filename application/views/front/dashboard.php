<style>
  button.selected {
    background-color: #6c757d;
    color: white;
  }
</style>
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
              <table class="table" style="width: 100%" id="cart">
                <tr>
                  <td style="width: 60%">Item</td>
                  <td style="text-align: center">Qty</td>
                  <td style="text-align: center">
                    Price
                  </td>
                  <td style="text-align: center">
                    Action
                  </td>
                </tr>

              </table>
            </div>
          </div>
          <div class="col-md-2 text-center bg p-0">
            <div class="menu">
              <?php foreach ($kategori->result_array() as $kategori1) { ?>
                <button class="btn btn-outline-secondary w-100 kategori" data-id_kategori="<?= $kategori1['id_kategori'] ?>" style="height: 60px; margin-top: 10px; margin-bottom: 5px">
                  <?= $kategori1['nama_kategori'] ?>
                </button>
              <?php } ?>
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
                    <button class="btn btn-outline-dark w-100">SEND</button>
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
        <div class="row menu-harga" id="productByCategory">
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/1.jpg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W1. Nasi Goreng</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/2.jpg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W2. Mie Aceh Gor/ Reb</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/3.jpeg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W3. Mie Goreng</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/4.jpg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W4. Kwetiau Goreng</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/1.jpg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W1. Nasi Goreng</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/2.jpg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W2. Mie Aceh Gor/ Reb</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/3.jpeg" class="card-img-top" style="padding: 5px" alt="..." />
              <div class="card-body">
                <a href="#" class="btn stretched-link">W3. Mie Goreng</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center border-2 my-2">
              <img src="<?= base_url('assets/front') ?>/image/4.jpg" class="card-img-top" style="padding: 5px" alt="..." />
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

<script>
  $("button").on("click", function() {
    $("button").removeClass("selected");
    $(this).addClass("selected");
  });
</script>

<script>
  $(document).ready(function() {
    $('.kategori').click(function() {
      var id_kategori = $(this).data('id_kategori'); // Mendapatkan ID dari atribut data-id tombol yang diklik
      $('#productByCategory').html('');
      // Memuat data menggunakan AJAX dengan mengirimkan ID sebagai parameter
      $.ajax({
        url: '<?php echo base_url("Dashboard/getProductByCategory"); ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id_kategori: id_kategori
        },
        success: function(response) {
          var content = '';
          for (var i = 0; i < response.length; i++) {
            var data = response[i];
            content += '<div class="col-3">' +
              '<div class="card text-center border-2 my-2 productToCart" data-id_product = "' + data.id_product + '">' +
              '<img src="<?= base_url('assets/front') ?>/image/' + data.image + '" class="card-img-top" style="padding: 5px" alt="..." />' +
              '<div class="card-body">' +
              '<button class="btn stretched-link">' + data.nama_product + '</button>' +
              '</div>' +
              '</div>' +
              '</div>';
          }
          $('#productByCategory').html(content);


        },
        error: function() {
          alert('Terjadi kesalahan dalam memuat data.');
        }
      });


    });
  });
</script>

<script>
  $(document).ready(function() {
    $(document).on('click', '.productToCart', function() {

      var id_product = $(this).data('id_product'); // Mendapatkan ID dari atribut data-id tombol yang diklik

      // Memuat data menggunakan AJAX dengan mengirimkan ID sebagai parameter
      $.ajax({
        url: '<?php echo base_url("Dashboard/add_to_cart"); ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id_product: id_product
        },
        success: function(response) {
          var content = '<tr>' +
            '<td style="width: 60%">Item</td>' +
            '<td style="text-align: center">Qty</td>' +
            '<td style="text-align: center">' +
            'Price' +
            '</td>' +
            '<td style="text-align: center">' +
            'Action' +
            '</td>' +
            '</tr>';
          for (var i = 0; i < response.length; i++) {
            var data = response[i];
            content += '<tr>' +
              '<td style="width: 60%">' + data.name + '</td>' +
              '<td style="text-align: center">' + data.qty + '</td>' +
              '<td style="text-align: center">' +
              data.price +
              '</td>' +
              '<td style="text-align: center">' +
              '<button class="btn btn-secondary">edit</button>' +
              '<button class="btn btn-danger">X</button>' +
              '</td>' +
              '</tr>';

          }
          $('#cart').html(content);


        },
        error: function() {
          alert('Terjadi kesalahan dalam memuat data.');
        }
      });
    });




  });
</script>