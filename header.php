
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>My Product System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        #mySidebar {
            width: 230px;
            min-height: 100vh;
        }

        #mySidebar .nav-link {
            color: #ffffff;
            padding: 10px 12px;
            border-radius: 5px;
        }

        #mySidebar .nav-link:hover,
        #mySidebar .nav-link.active {
            background-color: #495057;
        }

        @media (min-width: 992px) {
            #mySidebar {
                position: static;
                transform: none !important;
                visibility: visible !important;
            }
        }

        @media print {
            #mySidebar,
            .mobile-header,
            .no-print {
                display: none !important;
            }

            .card {
                box-shadow: none !important;
                border: none !important;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid p-0 min-vh-100">
    <div class="row g-0 min-vh-100">
