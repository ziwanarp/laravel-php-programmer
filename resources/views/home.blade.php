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
        <h2><u>PRODUCTS LIST</u></h2>
    </div>
    

<div class="container">
    <div class="row col-lg-12">
        <div class="my-3">
            <div class="text-right mb-2">
              <form action="/allProducts" method="get">
                <input type="hidden" name="button" id="button" value="clicked">
                <button class="btn btn-primary ml-auto">Show Products</button>
              </form>
            </div>
        <table class="table table-striped table-bordered">
            <thead>
              <tr class="text-center">
                <th scope="col">Image</th>
                <th scope="col">Tittle</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Stock</th>
                <th scope="col">price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @isset($products)
              @foreach ($products as $product)
              <tbody>
                <tr>
                  <th class="text-center"><img src="{{$product['thumbnail']}}" alt="" width="50px"></th>
                  <td>{{$product['title']}}</td>
                  <td>{{$product['category']}}</td>
                  <td>{{$product['brand']}}</td>
                  <td>{{$product['stock']}}</td>
                  <td>{{$product['price']}}</td>
                  <td><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="show({{$product['id']}})">View</button></td>
                </tr>
              </tbody>
              @endforeach
            @endisset
          </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row col-lg-12">
              <div class="col-lg-6">
                <div id="image"></div>
              </div>
              <div class="col-lg-6">
                <h3>Price:</u>  $<div class="d-inline" id="price"></h3>
                <h6>Category: <div class="d-inline" id="category"></h6>
                <h6>Stock: <div class="d-inline" id="stock"></h6>
                <h6>Brand: <div class="d-inline" id="brand"></h6>
                <h6>Description: <div class="d-inline" id="description"></h6>
                <div id="ratingContainer" class="star-rating"></div>
              </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function show(value) {
            $.ajax({
                url: 'allProducts/'+value,
                method: 'get',
                dataType: 'json',
                success: function(data){
                    $('#exampleModalLabel').html(data.data.title);
                    $('#price').html(data.data.price);
                    $('#category').html(data.data.category);
                    $('#stock').html(data.data.stock);
                    $('#brand').html(data.data.brand);
                    $('#description').html(data.data.description);
                    $('#image').html('<img src="' +data.data.thumbnail+ '" alt="Image">');

                    displayRatingStars(data.data.rating);
                }
                });

                function displayRatingStars(rating) {
                const starContainer = document.getElementById('ratingContainer');
                starContainer.innerHTML = ''; // Clear any previous stars

                for (let i = 1; i <= 5; i++) {
                    const star = document.createElement('span');
                    star.className = i <= rating ? 'star' : 'star-empty'; // Use CSS classes to style stars
                    star.innerHTML = '&#9733;'; // Unicode star character (★)
                    starContainer.appendChild(star);
                }
            }
            }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</html>