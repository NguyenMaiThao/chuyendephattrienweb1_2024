<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refurbished Devices Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Refurbished Devices Shop Section -->
    <section class="container text-center my-5">
        <h2 class="mb-4">REFURBISHED DEVICES SHOP</h2>
        <div class="row">
            <div class="col-md-3">
                <img src="img1.jpg" class="img-fluid" alt="Headphones NK500">
                <h5 class="mt-3">HEADPHONES NK500</h5>
                <h8>$499.00</h8>
                <br>
                <button class="btn">Add to cart</button>
            </div>
            <div class="col-md-3">
                <img src="img2.jpg" class="img-fluid" alt="Phone 30N">
                <h5 class="mt-3">PHONE 30N</h5>
                <h8>$300.00</h8>
                <br>
                <button class="btn">Add to cart</button>
            </div>
            <div class="col-md-3">
                <img src="img3.jpg" class="img-fluid" alt="Phone GT550">
                <h5 class="mt-3">PHONE GT550</h5>
                <h8>$370.00</h8>
                <br>
                <button class="btn">Add to cart</button>
            </div>
            <div class="col-md-3">
                <img src="img4.jpg" class="img-fluid" alt="Phone TR300">
                <h5 class="mt-3">PHONE TR300</h5>
                <h8>$220.00</h8>
                <br>
                <button class="btn">Add to cart</button>
            </div>
        </div>
    </section>

    <!-- Certified Experts Section -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>CERTIFIED EXPERTS</h2>
            <div class="row">
                <div class="text col-6"><H5>We fix it all the popular brands</H5>
                    <p>Vivamus nibh dolor, posuere et consequat ut, posuere nec velit. Nullam non augue pretium, rutrum urna eu, viverra magna. Nullam accumsan arcu id auctor mattis. Vestibulum vitae bibendum nisl, a maximus massa. Vestibulum erat turpis, dapibus et diam nec, fringilla pellentesque nulla. Integer rutrum tristique nisi blandit volutpat. Proin rhoncus mauris in consequat vulputate. Etiam dictum mauris a sapien fermentum imperdiet. Suspendisse potenti. Aenean sagittis libero eu nibh varius imperdiet. Nunc tempus at mi eu convallis. Vestibulum suscipit congue nunc sed ultrices. Phasellus posuere, elit nec euismod fermentum, purus massa congue magna, nec consequat arcu nisi sit amet sapien.</p>
                </div>
                <div class="col-6">
                    <div class="row justify-content-center">
                        <div class="col-2"><img src="logo1.png" class="img-fluid" alt="Apple"></div>
                        <div class="col-2"><img src="logo2.png" class="img-fluid" alt="Fujitsu"></div>
                        <div class="col-2"><img src="logo3.png" class="img-fluid" alt="Sharp"></div>
                        <div class="col-2"><img src="logo4.png" class="img-fluid" alt="Dell"></div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-2"><img src="logo5.png" class="img-fluid" alt="Siemens"></div>
                        <div class="col-2"><img src="logo6.png" class="img-fluid" alt="Bose"></div>
                        <div class="col-2"><img src="logo7.png" class="img-fluid" alt="Samsung"></div>
                        <div class="col-2"><img src="logo8.png" class="img-fluid" alt="Acer"></div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-2"><img src="logo9.png" class="img-fluid" alt="Panasonic"></div>
                        <div class="col-2"><img src="logo10.png" class="img-fluid" alt="Asus"></div>
                        <div class="col-2"><img src="logo11.png" class="img-fluid" alt="LG"></div>
                        <div class="col-2"><img src="logo12.png" class="img-fluid" alt="Sony"></div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-2"><img src="logo13.png" class="img-fluid" alt="JVC"></div>
                        <div class="col-2"><img src="logo14.png" class="img-fluid" alt="Philip"></div>
                        <div class="col-2"><img src="logo15.png" class="img-fluid" alt="Lenovo"></div>
                        <div class="col-2"><img src="logo16.png" class="img-fluid" alt="HP"></div>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>