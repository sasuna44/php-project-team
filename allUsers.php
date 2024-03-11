<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <title>AllUsers</title>
    <script src="/js/createUsers.js"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
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
  * {
    margin: 0;
    padding: 0;
}
    body {
    background-image:
    linear-gradient(to bottom, rgba(245, 246, 252, 0.718), rgba(94, 141, 112, 0.73)),
    url('images/back.jpg');
    background-size: cover;
    color: rgb(62, 62, 62);
    padding: 20px;
}
</style>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
                <?php
                    include 'db.php';

                    $db = new db();

                    $conn = $db->get_connection();

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $result = $db->get_data('Users WHERE role = "admin"');

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo '<a class="navbar-brand" href="#">' . $row["user_name"] . '</a>';
                        echo '<img src="' . $row["user_image"] . '" alt="img" width="100" height="100" />'
                        ;
                    } else {
                        echo "0 results";
                    }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Users <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Manual orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Checks</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" id="allproduct">
            <div>
                <ul>
                    <li>
                        <h3>All Users</h3>
                    </li>
                    <a id="add" href="http://" target="_blank" rel="noopener noreferrer">
                        <li>Add User</li>
                    </a>
                </ul>
            </div>
            <div class="container">
                
    <div class="row" id="cardcontainer">
        <?php

         $db = new db();
        $result = $db->get_data('Users WHERE role = "user"');


        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="card">';
                echo '<img src="' . $row["user_image"] . '" class="card-img-top" alt="User Image">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["user_name"] . '</h5>';
                echo '<ul class="list-group">';
                echo '<li class="list-group-item">Email: ' . $row["user_email"] . '</li>';
                echo '<li class="list-group-item">Role: ' . $row["role"] . '</li>';
                echo '<li class="list-group-item">Room Number: ' . ($row["room_number"] ? $row["room_number"] : 'NULL') . '</li>';
                echo '<li class="list-group-item">Ext Number: ' . ($row["ext_number"] ? $row["ext_number"] : 'NULL') . '</li>';
                echo '</ul>';
                
                echo '<div class="btncontainer">';
                echo '<form action="edit_user.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="btn btn-primary">Edit</button>';
                echo '</form>';
                echo '<form action="delete_user.php" method="post">';
                echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                echo '<button type="submit" class="btn btn-danger">Delete</button>';
                echo '</form>';
                echo '</div>'; // btncontainer
                echo '</div>'; // card-body
                echo '</div>'; // card

            }
        } else {
            echo '<p>No users found.</p>';
        }        
        ?>
    </div> <!-- End of row for user cards -->
</div> <!-- End of container -->

        </div> <!-- End of container for cards -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script>
            function scrollFunction() {
      if (
        document.body.scrollTop > 5 ||
        document.documentElement.scrollTop > 5
      ) {
        document.querySelector("nav").classList.add("navbar-scrolled");
      } else {
        document.querySelector("nav").classList.remove("navbar-scrolled");
      }
    }
    window.addEventListener("scroll", scrollFunction);

        </script>
</body>

</html>