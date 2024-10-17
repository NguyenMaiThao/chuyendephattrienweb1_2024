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
    <title>Contact Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Contact Details Section */
        .card-header {
            font-size: 1.2rem;
            background-color: #172b4d;
            color: white;
            font-weight: bold;
            position: relative;
        }

        /* Move button to the right */
        .option {
            background-color: #43c3ea;
            color: white;
            border: none;
            position: absolute;
            right: 10px;
            top: 5px;
            padding: 5px 10px;
            cursor: pointer;
        }

        .card-body ul li {
            margin-bottom: 15px;
        }

        .card {
            border: 1px solid;
            border-radius: 0;
        }

        .card-header:first-child {
            border-radius: 0 !important;
        }

        p {
            margin-left: 26px;
        }

        input,
        textarea {
            border-radius: 0 !important;
        }

        .btn-regional-office {
            margin-top: 15px;
            width: 100%;
            height: 50px;
            border: none;
            background-color: #30c3f5;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }

        .contact-detail,
        .contact-form {
            font-weight: bold;
        }

        form input,
        form textarea {
            border: 1px solid #ccc;
        }

        form input:focus,
        form textarea:focus {
            border-color: #0088cc;
            box-shadow: none;
        }

        form button {
            background-color: #43c3ea;
            border: none;
            padding: 12px;
            font-size: 1rem;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            margin-top: 50px;
            width: 100%;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .col-md-4 {
                margin-bottom: 20px;
            }

            .option {
                width: 100%;
                text-align: center;
            }

            .btn-regional-office {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="row">
            <!-- Contact Details -->
            <div class="col-md-4">
                <h3 class="contact-detail mb-3">Contact Details</h3> <!-- Contact Details Title -->
                <div class="card">
                    <div class="card-header">
                        Corporate Office
                        <button class="option" type="button">
                            <div class="icon-option"><i class="bi-chevron-down"></i></div>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><i class="bi bi-geo-alt-fill"></i><strong>32, BREAKING STREET,</strong>
                                <p>2nd cross, Newyork, USA 10002</p>
                            </li>
                            <li><i class="bi bi-telephone-fill"></i> <strong>CALL US:</strong>
                                <p>+321 4567 89 012 & 79 023</p>
                            </li>
                            <li><i class="bi bi-envelope-fill"></i><strong>MAIL US:</strong>
                                <p>Support@Repairplus.com</p>
                            </li>
                            <li><i class="bi bi-clock-fill"></i><strong>OPENING TIME:</strong>
                                <p>Mon - Sat: 09.00am to 18.00pm</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="btn-regional-officee">Regional Office 
                    <button class="optionn" type="button">
                        <div class="icon-optionn"><i class="arrow-icon bi bi-chevron-right"></i></div>
                    </button>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <h3 class="contact-form mb-3">Contact Form</h3>
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Your Name*" required>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Your Mail*" required>
                        </div>
                    </div>
                    <div class="row mb-3" style="padding-top: 20px;">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="col">
                            <input type="email" class="form-control" placeholder="Subject" required>
                        </div>
                    </div>
                    <div class="mb-3" style="padding-top: 20px;">
                        <textarea class="form-control" style="height: 170px;" rows="5" placeholder="Your Message.." required></textarea>
                    </div>
                    <button type="submit" class="btn-send">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and icons -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

</body>

</html>