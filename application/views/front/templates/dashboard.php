<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sendok Garpu | <?= $title; ?></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="<?= base_url('assets/front/')?>css/style.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-danger">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Sendok Garpu</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-white"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Order History
              </a>
              <ul class="dropdown-menu bg-secondary">
                <li>
                  <a class="dropdown-item text-white" href="./index.html"
                    >Point Of Sale</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#">Pos Register</a>
                </li>
                <li>
                  <a class="dropdown-item text-white" href="#">Held Orders</a>
                </li>
                <li>
                  <a class="dropdown-item text-white" href="./order_h.html"
                    >Order History</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-white" href="./cloce_in_out.html"
                    >Clock In / Clock Out</a
                  >
                </li>
                <li><a class="dropdown-item text-white" href="#">Report</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-white"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Welcom, test!
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Body -->
    <?= $contents; ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
