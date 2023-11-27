<form _lpchecked="1" method="POST" action="{{ route('update-status') }}">
    @csrf
    <div class="buttons row row-cols-auto">

        @if (auth()->user()->role_id == 0)
            <div class="col">
                <label class="form-label" for="">Status:</label>
            </div>
            <div class="col">
                <select class="button select-btn form-select form-select-lg" name="status_options"
                    aria-label=".form-select-lg">
                    <option value="New" {{ $data->status === 'New' ? 'selected' : '' }}> New
                    </option>
                    <option value="Pending" {{ $data->status === 'Pending' ? 'selected' : '' }}>
                        Pending</option>
                    <option value="Approved" {{ $data->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $data->status === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>
        @endif


        @if (auth()->user()->role_id == 0)
            <div class="col">
                <div class="button addComment"><a class="btn add-comment btn-secondary"><i
                            class="fa-solid fa-plus"></i>&nbsp&nbspAdd
                        comment</a>
                </div>
            </div>
        @endif
        @if (auth()->user()->role_id == 1)
            <div class="col">
                <div class="button addComment"><a class="btn add-comment btn-secondary"><i
                            class="glyphicon glyphicon-comment"></i>&nbsp&nbspShow
                        Comment</a></div>
            </div>
        @endif
        <div class="col">
            <div class="button"><a href="{{ url('generate-pdf/' . $data->id) }}" class="btn pdf btn-secondary"><i
                        class="glyphicon glyphicon-copy"></i> &nbsp&nbspPDF</a>
            </div>
        </div>
        @if (auth()->user()->role_id == 0)
            <div class="col">
                <div class="button">
                    <button id="submit" type="submit" class="btn submit btn-primary">Save</button>
                </div>
            </div>
        @endif
    </div>

    <input type="hidden" name="app-id" value="{{ $data->id }}" id="">





    <div class="modal" id="commentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (auth()->user()->role_id == 0)
                        <textarea class="form-control" name="admin-comment" id="comment" cols="30" rows="5"></textarea>
                    @endif
                    @if (auth()->user()->role_id == 1)
                        <textarea class="form-control" name="admin-comment" id="comment" cols="30" rows="5">{{ $data->admin_comment }}</textarea>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $('.addComment').click(function(e) {
        e.preventDefault();

        $('#commentModal').modal('show');
    })
</script>
