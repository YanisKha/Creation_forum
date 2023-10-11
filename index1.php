<!DOCTYPE HTML>

<html data-bs-theme="">

<?php include 'header.html';
include 'db_conn.php';
?>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <div class="inner">

                <!-- Logo -->
                <a href="index1.php" class="logo">
                    <span class="title">Blog base</span>
                </a>
            </div>

            <!-- Nav -->
            <div>
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="generic.html">Ipsum veroeros</a></li>
                <li><a href="generic.html">Tempus etiam</a></li>
                <li><a href="generic.html">Consequat dolor</a></li>
                <li><a href="elements.html">Elements</a></li>
            </ul>
        </nav>

        <!-- Main -->
        <div id="main">
            <div class="inner">
                <header>
                    <h1></h1>
                    <br>
                    <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus
                        arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros
                        aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
                </header>



                <div class="card" style="width: 18rem;">
                    <img src="images/kenshin.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
                <br>
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body">
                        <h5 class="card-title">
                        </h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Button</a>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-5 shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- Footer -->
        <?php

        // index.php file
        include 'footer.html';
        ?>



</body>

</html>