<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Inventario</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="fontAwesome/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="dataTable/Tables/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="dataTable/Tables/css/jquery.dataTables.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="css/dashboard.css" rel="stylesheet">
</head>
    <body>
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Inventario</a>
            <button
                class="navbar-toggler position-absolute d-md-none collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#sidebarMenu"
                aria-controls="sidebarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap" style="margin-right: 18px;">
                    <a type="button" class="btn btn-primary position-relative" onclick="detalle('Detalle','Carrito');">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                        </span>-->
                    </a>
                </div>
            </div>
        </header>
        <div id="mascara" class="mascara text-center">
            <div class="img_mascara"><img src="cargando.gif" alt="Cargando" width="10%"></div>
        </div>
        <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a
                                class="nav-link active pointer"
                                aria-current="page"
                                onclick="detalle('Inventario','ListaZapatos');"
                            >
                                <span data-feather="list"></span>
                                Lista de zapatos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active pointer"
                                aria-current="page"
                                onclick="detalle('Inventario','CatalogoZapatos');"
                            >
                                <span data-feather="grid"></span>
                                Catalogo de zapatos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active pointer"
                                aria-current="page"
                                onclick="detalle('Ventas','Lista');"
                            >
                                <span data-feather="grid"></span>
                                Reporte de ventas
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="
                    d-flex
                    justify-content-between
                    flex-wrap
                    flex-md-nowrap
                    align-items-center
                    pt-3
                    pb-2
                    mb-3
                    border-bottom"
                >
                    <h1 class="h2">Inventario</h1>
                </div>

                <div id="detalle"></div>
            </main>
        </div>
    </div>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
            integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
            crossorigin="anonymous">
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
            integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
            crossorigin="anonymous">
        </script>
        <script
            src="js/dashboard.js">
        </script>
    </body>
</html>
