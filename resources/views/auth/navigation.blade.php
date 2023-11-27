<link rel="stylesheet" href="/css/navigation.css">

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-center primary-text fs-3 fw-bold text-uppercase border-bottom">
                Dashboard
            </div>
            <div class="list-group list-group-flush my-3">
                @if (auth()->user()->role_id == 1)
                    <a href="{{ route('dashboard') }}" class="list-group-item bg-transparent second-text">Home</a>
                @endif
                @if (auth()->user()->role_id == 0)
                    <a href="{{ route('admin-dashboard') }}" class="list-group-item bg-transparent second-text">Home</a>
                @endif
                <a class="sub-btn list-group-item bg-transparent second-text" href="">Forms <i id="icon"
                        class="fa-solid fa-sort-down"></i></a>
                <div class="subcategory">
                    <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                        href="{{ route('form1') }}">ECAF</a>
                    <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                        href="{{ route('form2') }}">ECPIF</a>
                    <a style="padding-left: 50px" class="list-group-item bg-transparent second-text"
                        href="{{ route('checklist') }}"> ECAC</a>
                </div>
                <a class="list-group-item bg-transparent second-text" href="{{ route('app-status') }}">App Status</a>

                <a href="{{ url('/logout') }}" class="list-group-item bg-transparent second-text">Log Out</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg bg-transparent py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">{{ $pageName }}</h2>
                </div>


                <ul class="username navbar-nav ms-auto mb-2 mb-lg-0">
                    <li>
                        <i class="fas fa-user me-2"></i>{{ auth()->user()->name }}
                    </li>
                </ul>

            </nav>

            <!-- /#page-content-wrapper -->


            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                };

                document.addEventListener("DOMContentLoaded", function() {
                    var subcategory = document.querySelector(".subcategory");
                    var subBtn = document.querySelector(".sub-btn");
                    var icon = document.querySelector("#icon");

                    subBtn.addEventListener("click", function() {
                        if (subcategory.style.maxHeight) {
                            subcategory.style.maxHeight = null;
                        } else {
                            subcategory.style.maxHeight = subcategory.scrollHeight + "px";
                        }
                    });
                });
            </script>
