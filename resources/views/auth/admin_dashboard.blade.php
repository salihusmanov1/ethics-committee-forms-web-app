@include('auth.header')

<link rel="stylesheet" href="css/admin_dashboard.css">


</head>

@include('auth.navigation')



<div class="main container px-4">
    <div class="row g-3 my-2">
        <div class=".col-md-6 .offset-md-3">
            <div class="panel panel-default animated zoomIn">
                <div class="panel-heading main-color-bg">
                    <h3 class="panel-title">Overview</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="well dash-box">
                            <h4><span class="glyphicon glyphicon-list-alt"></span> {{ $newapps }}</h4>
                            <h4>New Request</h4>
                        </div>
                    </div>
                    <div class="col-md-4 dash-box">
                        <div class="well">
                            <h4><span class="glyphicon glyphicon-ok"></span> {{ $approvedapps }}</h4>
                            <h4>Approved</h4>
                        </div>
                    </div>
                    <div class="col-md-4 dash-box">
                        <div class="well">
                            <h4><span class="glyphicon glyphicon-time"></span> {{ $pendingapps }}</h4>

                            <h4>Pending</h4>
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel panel-default animated zoomIn">
                <!-- Default panel contents -->
                <div class="panel-heading main-color-bg">Latest Users</div>
                <div class="panel-body">
                    <!-- Table -->
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>




    </html>
