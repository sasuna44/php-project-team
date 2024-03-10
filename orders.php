<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css.css">
    <style>
        .total-price {
            border-bottom: 5px solid black;
            font-weight: bold;
            font-style: italic;
            font-size: 3em;
            margin-top: 10px;
        } 

        .product-image {
            width: 300rem; 
            height: 300rem;
        }

        .product-price-display {
            display: none;
            position: absolute;
            background-color: white;
            padding: 5px;
            border: 1px solid #ccc;
            z-index: 1;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; 
            justify-content: center;
        }

        .image-item {
            flex: 0 0 auto;
        }

        .product-details {
            display: none;
            position: absolute;
            background-color: white;
            padding: 5px;
            border: 1px solid #ccc;
            z-index: 1;
            text-align: center;
        }

        .product-image-container:hover .product-details {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Your Name</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Manual Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Checks</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="admin-orders">
        <section class="main-padding">
            <div class="container">
                <h1>Orders</h1>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">order</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">Ext</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php include 'allorders.php'; ?>

                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container text-center">
            <span>&copy; 2024 Your Company</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.querySelector(".navbar").classList.add("navbar-scrolled");
            } else {
                document.querySelector(".navbar").classList.remove("navbar-scrolled");
            }
        }
    </script>
</body>
</html>
