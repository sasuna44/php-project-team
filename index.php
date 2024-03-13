
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <!-- <script src="./js/script.js"></script> -->
    <style>
        :root {
  --dark: #1d1d1d;
  --grey-dark: #414141;
  --light: #fff;
  --mid: #ededed;
  --grey: #989898;
  --gray: #989898;
  --green: #28a92b;
  --green-dark: #4e9815;
  --green-light: #6fb936;
  --blue: #2c7ad2;
  --purple: #8d3dae;
  --red: #c82736;
  --orange: #e77614;
  accent-color: var(--green);
}
body {
  background-color: #111;
  font-family: "Signika Negative", sans-serif, Arial;
  margin: 0;
  padding: 0;
  overflow-x: hidden;
  color: white!important;
}

#smooth-wrapper{
  width: 100%;
}
#smooth-content {
  position: relative;
  overflow: visible;
  width: 100%;
  /* set a height because the contents are position: absolute, thus natively there's no height */
  height: 2200px;
  background-image:
    linear-gradient(rgba(255,255,255,.07) 2px, transparent 2px),
    linear-gradient(90deg, rgba(255,255,255,.07) 2px, transparent 2px),
    linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.06) 1px, transparent 1px);
  background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
  background-position: -2px -2px, -2px -2px, -1px -1px, -1px -1px;
}

#section1 ,#section2 {
  /* height: 400px; */
  margin-top: 50px;
  width: 1400px;
  display: flex;
  align-items: start;
  flex-direction: column;
  justify-content: space-around;
  background-color:red  !important;
}

#section2{
  height: 900px;
  display: block;
}
.show-details{
  display: block;
}
.navbar {
  background-color: transparent !important; /* Set initial background color to transparent */
  transition: background-color 0.3s ease;/* Transparent background color */

}
.navbar-scrolled {
  background-color:#6fb936 !important; /* Change background color when scrolled */
}
.checks{
  position: absolute;
  margin-top: 100px;
  width: 100%;
}
.checks h1{
  font-size: 70px;
  cursor: pointer;
}
.navbar-dark .navbar-brand {
  color: #ffffff; /* Text color for navbar brand */
}
.navbar-dark .navbar-nav .nav-link {
  color: #ffffff; /* Text color for navbar links */
}
form {
 width: 800px;
 
}
.form-group {
  margin-bottom: 20px;
  
}

label {
  font-weight: bold;
}
form input{
  background-color: transparent;
}
input[type="date"] {
  width: 100%;
  padding: 10px;
  border: 2px solid #ccc;
  border-radius: 5px;
  background-color: transparent;
  color: white;
  padding-top: 25px;
  padding-bottom: 25px;
}
input[type="date"]::placeholder{
  color: white;
}
input[type="date"]:focus {
  background-color: transparent;
  border: 2px solid #4e9815; 
  outline: none; 
}
.form-control:focus{
  outline: none;
}
button.btn {
  width: 25%;
  padding: 10px;
  border-radius: 5px;
  background-color:#6fb936; 
  border: none;
  color: white;
}

button.btn:hover {
  background-color: #4e9815; 
  color: white;
}
button.btn:active{
  background-color: #4e9815;
  outline: none;
  border-color: #ced4da;
}
.datecheck{
  width: 1400px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
 
}
.image-container {
  position: relative;
  display: inline-block;
}

.image-container img {
  height: 470px;
  width: 330px;
  border-radius: 30px;
  cursor: pointer;
}



.form-control:focus {
  box-shadow: none;
  border-color: #ced4da;
}

[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(1);
}

/* .card {
  width: 300px;
  height: 400px;
  margin: 0 10px; 
  position: relative;
  overflow: hidden;
  border-radius: 20px; 
} */

/* .card img {
  width: 100%;
 
  object-fit: cover;
} */
.card-body{
  background-color:red;
}
.behind {
  position: absolute;
  top: 0;
  left: 58%;
  transform: translateX(-50%);
  z-index: -1;
  transform: rotate(30%);
}
.behind img{
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
  filter: blur(2px);
}
.frist {
  box-shadow: 10px 0px 20px 10px rgba(10, 1, 1, 0.873); 
  position: relative;
  z-index: 1; 
}
#user-details-{
  display:none;
}


.footer{
  background-color: #6fb936;
}
.form-select {
  width: 20%;
  display: block;
  border: 2px solid #ccc;
  border-radius: 5px;
  background-color: transparent;
  color: white;
  margin-bottom: 20px; /* Corrected typo */
  padding-top:10px;
  padding-bottom:10px;
}

.form-select option {
  padding-top:20px;
  padding:20px;
  color:black;
  font-size:17px
}
#section3{
  display:flex;
  flex-direction:row;
}
.card-img-top {
    width: 100%;
    height:20rem;
    margin:0.5rem 0 0 0 ;
}
.card{
    margin:0.5rem;
    width: 18rem;
    border: 2px solid transparent;
    transition: border-color 0.4s ease;
    box-shadow: 2px 2px 3px #e0e5fec6; 
    background-image: linear-gradient(to bottom,transparent 85%,#28a92a70);
    color:black;
}

        </style>
</head>

<body>
    <div id="smooth-wrapper container">
        <div id="smooth-content">
            <!--  -->
            <nav class="navbar navbar-expand-lg  navbar-dark fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="#">Your name</a>
                    <img src="" alt="img" />
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">manual orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">checks</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--  -->
            <div class="checks container">
                <div class="des">
                    <h1>checks</h1> <a href="#section2" class="section2">orders</a>
                    <a href="#section1">users</a>
                </div>
                <div class="datecheck">
                    <form method="GET">
                        <div class="form-group">
                            <label for="fromDate">From:</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate" placeholder="Select start date">
                        </div>
                        <div class="form-group">
                            <label for="toDate">To:</label>
                            <input type="date" class="form-control" id="toDate" name="toDate" placeholder="Select end date">
                        </div>

                        <?php
                        include 'db.php'; // Include the database class file
                        $db = new db();
                        // Create an instance of the database class
                        $result = $db->get_connection()->query("SELECT * FROM users WHERE role = 'user'");

                        // Check if there are any users
                        if ($result->num_rows > 0) {
                            // Start the select dropdown menu
                            echo '<select class="form-select" aria-label="Default select example" name="userId">';
                            echo '<option selected disabled>Choose user</option>';

                            // Fetch each user's data and create an option tag for their name
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['user_name'] . '</option>';
                            }

                            // Close the select dropdown menu
                            echo '</select>';
                        } else {
                            echo 'No users found.';
                        }
                        ?>
                        <button type="submit" class="btn ">Submit</button>
                    </form>

                </div>
                <section class="main" id="section1">
    <h2>Users</h2>
    <?php
    // Check if fromDate and toDate are set in the $_GET array
    if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
        // Retrieve start date and end date from the form
        $fromDate = $_GET['fromDate'];
        $toDate = $_GET['toDate'];
        
        // Create an instance of the database class
        $db = new db();
        
        // Initialize the user condition
        $userCondition = "";
        
        // Check if userId is set
        if (isset($_GET['userId'])) {
            $userId = $_GET['userId'];
            // Construct the user condition
            $userCondition = "AND u.id = $userId";
        }
        
        // Construct the SQL query to fetch the sum of total prices for all orders within the specified date range
        $query = "SELECT u.user_name, SUM(od.quantity * p.product_price) AS total_price 
                  FROM users u 
                  INNER JOIN orders o ON u.id = o.id
                  INNER JOIN orderdetails od ON o.order_id = od.order_id
                  INNER JOIN products p ON od.product_id = p.id
                  WHERE o.order_date BETWEEN '$fromDate' AND '$toDate'
                  $userCondition
                  GROUP BY u.user_name";
        
        // Execute the query
        $result = $db->get_connection()->query($query);
        
        // Display the user's name and total price
        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr><th>User Name</th><th>Total Price</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["user_name"] . '</td>';
                echo '<td>' . $row["total_price"] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo '<p>No order details found within the specified time period.</p>';
        }
    } else {
        echo '<p>Please select start date and end date.</p>';
    }
    ?>
</section>




<section id="section2">
<?php
if (isset($_GET['fromDate']) && isset($_GET['toDate'])) {
    $fromDate = $_GET['fromDate'];
    $toDate = $_GET['toDate'];
    
    $db = new db();
    $query = "SELECT o.order_id, o.order_date, od.product_id, p.product_name, od.quantity, (od.quantity * p.product_price) AS total_price
              FROM orders o 
              INNER JOIN orderdetails od ON o.order_id = od.order_id
              INNER JOIN products p ON od.product_id = p.id
              WHERE o.order_date BETWEEN '$fromDate' AND '$toDate'";

    if (!empty($userId)) {
        $query .= " AND o.id = $userId";
    }

    $result = $db->get_connection()->query($query);

    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr><th>Order ID</th><th>Order Date</th><th>Product Name</th><th>Quantity</th><th>Total Price</th></tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['order_id'] . '</td>'; 
            echo '<td>' . $row['order_date'] . '</td>'; 
            echo '<td>' . $row['product_name'] . '</td>'; 
            echo '<td>' . $row['quantity'] . '</td>'; 
            echo '<td>' . $row['total_price'] . '</td>'; 
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No orders found for the selected user within the specified time period.';
    }
} else {
    echo 'Please select start and end dates.';
}
?>
</section>

<section id="section3">
    <?php
    // Check if fromDate, toDate, and userId are set in the $_GET array
    if (isset($_GET['fromDate']) && isset($_GET['toDate']) && isset($_GET['userId'])) {
        // Retrieve start date, end date, and user ID from the form
        $fromDate = $_GET['fromDate'];
        $toDate = $_GET['toDate'];
        $userId = $_GET['userId'];
        
        // Create an instance of the database class
        $db = new db();
        
        // Construct the SQL query to fetch product details and order quantity for the specified user and date range
        $query = "SELECT p.product_image, p.product_name, p.product_price, od.quantity 
                  FROM orderdetails od
                  INNER JOIN products p ON od.product_id = p.id
                  INNER JOIN orders o ON od.order_id = o.order_id
                  WHERE o.order_date BETWEEN '$fromDate' AND '$toDate' AND o.id = $userId";

        // Execute the query
        $result = $db->get_connection()->query($query);

        // Display the order details
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="' . $row["product_image"] . '" class="card-img-top" alt="Product Image">';
                echo '<div class="card-body">';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item">Name: ' . $row["product_name"] . '</li>';
                echo '<li class="list-group-item">Price: $' . $row["product_price"] . '</li>';
                echo '<li class="list-group-item">Quantity: ' . $row["quantity"] . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No order details found.</p>';
        }
    } else {
        echo '<p>Please select start date, end date, and user ID.</p>';
    }
    ?>
</section> 

        </div>
    </div>
    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span>&copy; 2024 Your Company</span>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    window.onload = function () {
        $(document).ready(function () {
            $("a").on('click', function (event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 800, function () {
                        window.location.hash = hash;
                    });
                }
            });
        });

        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                document.querySelector("nav").classList.add("navbar-scrolled");
            } else {
                document.querySelector("nav").classList.remove("navbar-scrolled");
            }
        }
    }

   
</script>



</body>

</html>