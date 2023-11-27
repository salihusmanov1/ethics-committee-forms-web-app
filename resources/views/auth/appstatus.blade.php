@include('auth.header')


<link rel="stylesheet" href="css/appstatus.css">
</head>

@include('auth.navigation')


<div id="deleteModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body alert alert-warning">
                <p>Are you sure you want to delete this data? This action is irreversible and will permanently remove
                    the selected data from the system. Please make sure you have a backup of any important information
                    before proceeding</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="confirmDelete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>



<div class="container">
    @if (Session::has('status'))
        <div class="alert alert-success">
            {{ Session::get('status') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif


    @csrf
    <div class="table-responsive-sm">
        <table class="table table-sm table-fixed" id="myTable">
            <thead>
                {{-- TABLE HEADING --}}
                <tr>
                    <th class="top-left" scope="col">Application No</th>
                    <th scope="col">Application type</th>
                    <th scope="col">Status</th>
                    @if (auth()->user()->role_id == 0)
                        <th scope="col">User Email</th>
                    @endif
                    <th scope="col">Created</th>
                    @if (auth()->user()->role_id == 1)
                        <th scope="col">Comment</th>
                    @endif
                    <th class="top-right" scope="col"></th>

                </tr>
            </thead>

            <tbody class="table-group-divider">

                @foreach ($datas as $data)
                    <tr>
                        {{-- ID --}}
                        <th scope="row"><a href="{{ url('show/' . $data->id) }}">#{{ $data->id }} </a></th>
                        {{-- TYPE --}}
                        <td>{{ $data->type }}</td>

                        {{-- STATUS --}}

                        <td>{{ $data->status }}</td>

                        {{-- EMAIL --}}
                        @if (auth()->user()->role_id == 0)
                            <td>{{ $data->user_email }}</td>
                        @endif
                        {{-- DATA --}}
                        <td>{{ $data->created_at->format('Y-m-d') }}</td>

                        {{-- COMMENT --}}

                        @if (auth()->user()->role_id == 1)
                            <td>
                                @if ($data->admin_comment !== null)
                                    <p>(1) Comment</p>
                                @endif
                            </td>
                        @endif
                        {{-- BUTTON --}}
                        <td>
                            <div class="dropdown">
                                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>

                                <ul class="dropdown-menu">
                                    @if (auth()->user()->role_id == 1)
                                        <li><a  class="btn dropdown-item" href="{{ url('edit/' . $data->id) }}">edit</a>
                                        </li>
                                    @endif

                                    <li><a data-id="{{$data->id}}" class="btn delete dropdown-item">delete</a></li>

                                </ul>
                            </div>
                        </td>
                        </td>
                        </td>

                    </tr>
                    <input type="hidden" name="ids[]" value="{{ $data->id }}">
                @endforeach

            </tbody>
        </table>
    </div>


</div>
</main>

<script>
    let table = new DataTable('#myTable');

    $(document).ready(function() {
        $('.delete').click(function(e) {
            e.preventDefault();
            var dataId = $(this).data('id');
            $('#deleteModal').modal('show');
            $('#deleteModal #confirmDelete').attr('href', `delete_appstatus/${dataId}`);
        })
    })
</script>


</html>
