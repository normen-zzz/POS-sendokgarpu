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
              <table class="table" id="tblcart" style="width: 100%" id="cart">
                <tr>
                  <th style="width: 60%">Item</th>
                  <th style="text-align: center">Qty</th>
                  <th style="text-align: center">Price</th>
                  <th style="text-align: center">Total</th>
                  <th style="text-align: center">Action</th>
                </tr>
                <?php
                $subtotal = 0;
                foreach ($this->cart->contents() as $cart) {
                  $subtotal += $cart['subtotal'];
                ?>
                  <tr>
                    <td style="width: 60%">
                      <span class="item-name"><?= $cart['name'] ?></span>
                      <form class="edit-form" style="display: none;">
                        <input type="number" class="form-control" value="<?= $cart['qty'] ?>" />
                        <button type="submit" class="btn btn-primary save-btn">Save</button>
                        <button type="button" class="btn btn-secondary cancel-btn">Cancel</button>
                      </form>
                    </td>
                    <td style="text-align: center">
                      <span class="qty-value"><?= $cart['qty'] ?></span>
                    </td>
                    <td style="text-align: center"><?= $cart['price'] ?></td>
                    <td style="text-align: center"><?= $cart['subtotal'] ?></td>
                    <td style="text-align: center">
                      <button class="btn btn-secondary edit-btn">edit</button>
                      <a href="<?= base_url('dashboard/destroyCartById/' . $cart['id']) ?>">
                        <button class="btn btn-danger">X</button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
          </div>
          <div class="col-md-2 text-center bg p-0">
            <div class="menu">
              <?php foreach ($category->result_array() as $category1) { ?>
                <button class="btn btn-outline-secondary w-100 category" data-id_category="<?= $category1['id_category'] ?>" style="height: 60px; margin-top: 10px; margin-bottom: 5px">
                  <?= $category1['name_category'] ?>
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
                  <td scope="col">
                    <div id="subtotal">
                      $<?= $subtotal ?>
                    </div>
                  </td>
                  <th scope="col" class="text-end h4">Total</th>
                </tr>
                <tr>
                  <th scope="col">TAX</th>
                  <td scope="col">10% + Student Disc.</td>
                  <td scope="col" class="text-success h3 fw-bold text-end">
                    <div id="finalTotal">
                      $<?= $subtotal + ($subtotal * 0.1) ?>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <a href="<?= base_url('Dashboard/destroyCart') ?>" class="btn btn-outline-dark w-100">
                      CLEAR
                    </a>
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
          <?php foreach ($product->result_array() as $product1) { ?>
            <div class="col-3">
              <div class="card text-center border-2 my-2 productToCart" data-id_product="<?= $product1['id_product'] ?>">
                <img src="<?= base_url('assets/front/image/' . $product1['image']) ?>" class="card-img-top" style="padding: 5px" alt="..." />
                <div class="card-body">
                  <a href="#" class="btn stretched-link"><?= $product1['name_product'] ?></a>
                </div>
              </div>
            </div>
          <?php } ?>
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
    $(document).on('click', '.category', function() {
      var id_category = $(this).data('id_category');
      $('#productByCategory').html('');

      $.ajax({
        url: '<?php echo base_url("Dashboard/getProductByCategory"); ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id_category: id_category
        },
        success: function(response) {
          var content = '';
          for (var i = 0; i < response.length; i++) {
            var data = response[i];
            content += '<div class="col-3">' +
              '<div class="card text-center border-2 my-2 productToCart" data-id_product = "' + data.id_product + '">' +
              '<img src="<?= base_url('assets/front') ?>/image/' + data.image + '" class="card-img-top" style="padding: 5px" alt="..." />' +
              '<div class="card-body">' +
              '<button class="btn stretched-link">' + data.name_product + '</button>' +
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
      var id_product = $(this).data('id_product');

      $.ajax({
        url: '<?php echo base_url("Dashboard/add_to_cart"); ?>',
        type: 'GET',
        dataType: 'json',
        data: {
          id_product: id_product
        },
        success: function(response) {
          var content = '<tr>' +
            '<th style="width: 60%">Item</th>' +
            '<th style="text-align: center">Qty</th>' +
            '<th style="text-align: center">Price</th>' +
            '<th style="text-align: center">Total</th>' +
            '<th style="text-align: center">Action</th>' +
            '</tr>';
          var subtotal = 0;
          for (var i = 0; i < response.length; i++) {
            var data = response[i];
            content += '<tr>' +
              '<td style="width: 60%">' +
              '<span class="item-name">' + data.name + '</span>' +
              '<form class="edit-form" style="display: none;">' +
              '<input type="number" class="form-control" value="' + data.qty + '" />' +
              '<button type="submit" class="btn btn-primary save-btn">Save</button>' +
              '<button type="button" class="btn btn-secondary cancel-btn">Cancel</button>' +
              '</form>' +
              '</td>' +
              '<td style="text-align: center">' +
              '<span class="qty-value">' + data.qty + '</span>' +
              '</td>' +
              '<td style="text-align: center">' + data.price + '</td>' +
              '<td style="text-align: center">' +
              '<span class="subtotal-value">' + (Math.round(data.subtotal * 100) / 100).toFixed(2) + '</span>' +
              '</td>' +
              '<td style="text-align: center">' +
              '<button class="btn btn-secondary edit-btn">edit</button> ' +
              '<a href="<?= base_url('dashboard/destroyCartById/') ?>' + data.id + '""><button class="btn btn-danger">X</button></a>' +
              '</td>' +
              '</tr>';

            subtotal += data.subtotal;
          }
          $('#tblcart').html(content);
          $('#subtotal').html('$' + (Math.round(subtotal * 100) / 100).toFixed(2));
          $('#finalTotal').html('$' + (Math.round((subtotal + (subtotal * 0.1)) * 100) / 100).toFixed(2));
        },
        error: function() {
          alert('Terjadi kesalahan dalam memuat data.');
        }
      });
    });

    $(document).on('click', '.edit-btn', function() {
      var $tableRow = $(this).closest('tr');
      $tableRow.find('.item-name').hide();
      $tableRow.find('.qty-value').hide();
      $tableRow.find('.subtotal-value').hide();
      $tableRow.find('.edit-form').show();
    });

    $(document).on('click', '.cancel-btn', function() {
      var $tableRow = $(this).closest('tr');
      $tableRow.find('.edit-form').hide();
      $tableRow.find('.item-name').show();
      $tableRow.find('.qty-value').show();
      $tableRow.find('.subtotal-value').show();
    });

    $(document).on('submit', '.edit-form', function(e) {
      e.preventDefault();
      var $tableRow = $(this).closest('tr');
      var newQty = $(this).find('input').val();
      var price = parseFloat($tableRow.find('.subtotal-value').text()) / parseFloat($tableRow.find('.qty-value').text());
      var newSubtotal = price * newQty;
      $tableRow.find('.qty-value').text(newQty);
      $tableRow.find('.subtotal-value').text((Math.round(newSubtotal * 100) / 100).toFixed(2));
      $tableRow.find('.edit-form').hide();
      $tableRow.find('.item-name').show();
      $tableRow.find('.qty-value').show();
      $tableRow.find('.subtotal-value').show();

      updateTotal();
    });

    function updateTotal() {
      var subtotal = 0;
      $('.subtotal-value').each(function() {
        subtotal += parseFloat($(this).text());
      });

      var tax = subtotal * 0.1;
      var total = subtotal + tax;

      $('#subtotal').text('$' + (Math.round(subtotal * 100) / 100).toFixed(2));
      $('#finalTotal').text('$' + (Math.round(total * 100) / 100).toFixed(2));
    }
  });
</script>

