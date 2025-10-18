<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>INFORMATIVE</title>
    <style>
        /* Advanced header background with gradient and shadow */
        .header-gradient-bg {
            background: linear-gradient(90deg, #3743b6 0%, #5395ea 80%);
            box-shadow: 0 6px 24px rgba(41,69,156,0.13);
            border-bottom: 1.5px solid #204090;
        }
        /* Fancy Brand Font */
        .navbar-brand-fancy {
            font-family: 'Segoe UI', 'Poppins', 'Arial', sans-serif;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.63rem;
            color: #fff !important;
            text-shadow: 0 3px 12px rgba(54,71,173,0.09);
        }
        /* Animated underline for nav-links */
        .navbar-nav .nav-link {
            position: relative;
            font-weight: 500;
            color: #eaf0fa !important;
            margin-right: 7px;
            transition: color 0.18s;
        }
        .navbar-nav .nav-link::after {
            content: "";
            display: block;
            height: 2.5px;
            width: 0;
            background: #fff;
            border-radius: 2px;
            transition: width 0.23s;
            position: absolute;
            left: 50%;
            bottom: -3.5px;
            transform: translateX(-50%);
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 70%;
        }
        /* Navbar pill for active nav */
        .navbar .nav-item .nav-link.active,
        .navbar .nav-item .nav-link.active:focus {
            background: rgba(255,255,255,0.13);
            border-radius: 9px;
        }
        /* Navbar responsiveness tweak */
        @media (max-width: 991px) {
            .navbar-brand-fancy {
                font-size: 1.25rem;
            }
            .navbar-nav .nav-link {
                margin-right: 0;
                padding: 7.5px 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Enhanced Navigation Bar -->
    <nav class="navbar navbar-expand-lg header-gradient-bg shadow mb-4">
        <div class="container px-3">
            <a class="navbar-brand navbar-brand-fancy d-flex align-items-center gap-2" href="/">
                <svg width="30" height="30" fill="none" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" class="me-1">
                  <rect x="2" y="6" width="28" height="20" rx="5" fill="#e6ecff"/>
                  <rect x="6" y="2" width="20" height="28" rx="5" fill="#2e51bb"/>
                  <text x="16" y="20" text-anchor="middle" fill="#fff" font-size="14" font-family="Segoe UI" font-weight="bold">i</text>
                </svg>
                INFORMATIVE PLACE
            </a>
            <button class="navbar-toggler border-0 rounded-2 shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto gap-lg-2 align-items-lg-center">
                    <li class="nav-item">
                        <a href="/" class="nav-link<?php if ($_SERVER['REQUEST_URI'] == '/'): ?> active<?php endif; ?>">Home</a>
                    </li>
                    <?php if (Auth::isLoggedIn()): ?>
                        <li class="nav-item">
                            <a href="/admin/" class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], '/admin') === 0): ?> active<?php endif; ?>">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout.php" class="nav-link">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a href="/login.php" class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], '/login') === 0): ?> active<?php endif; ?>">Login</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="/contact.php" class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], '/contact') === 0): ?> active<?php endif; ?>">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4 mb-5">
    <!-- main content starts here -->

<!-- 
Note that these links are for development/testing purposes. When deploying, use root-relative paths:
'/' for home
'/logout' for logout
'/login' for login
'/admin/' for admin
-->
