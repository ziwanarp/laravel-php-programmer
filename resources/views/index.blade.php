<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP PROGRAMMER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     .star-rating {
            font-size: 24px;
            display: inline-block;
        }

        .star {
            color: gold; /* Color of filled stars */
        }

        .star-empty {
            color: lightgray; /* Color of empty stars */
        }
  </style>
</head>
<body>
    {{-- tiitle --}}
    <div class="mt-5 text-center">
        <h2><u>PHP PROGRAMMER</u></h2>
    </div>
    

<div class="container">
    <div class="row col-lg-12">
        <form action="/allProducts" method="get">
            <button class="btn btn-primary ml-auto">Products Page</button>
        </form>
        <div class="my-2">
            @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
            @endif
        </div>
        <form class="mx-auto" style="width: 50%;" action="/allProducts" method="POST">
            @csrf
            <!-- Form inputs go here -->
              <div class="my-3 row">
                <label for="no_pesanan" class="col-sm-2 col-form-label">No. Pesanan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="no_pesanan" name="no_pesanan" required>
                </div>
              </div>

              <div class="my-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="nama_supplier" class="col-sm-2 col-form-label">Nama Supplier</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_supplier" name="nm_supplier" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nama_produk" name="nm_produk" required>
                </div>
              </div>

              <div class="mb-3 row">
                <label for="total" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-4">
                  <input type="number" class="form-control" id="total" name="total" required>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Save</button>

        </form>
    </div>
</div>
      
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</html>