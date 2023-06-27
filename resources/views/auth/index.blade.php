@extends('component.container')

@section('dynamicdata')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Users List
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    {{-- @include('backend.components.alert') --}}

                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-body">
                            @include('success.success')
                            <div class="row">
                                <div class="col-6">
                                    <h3><a href="{{ url('create') }}" class="add-user-table btn btn-sm btn-primary">Add New
                                            &nbsp;<i class="fa fa-plus"></i></a></h3>
                                </div>
                                <div class="col-6">
                                    <form action="">
                                        <div class="input-group mb-3">
                                            <input type="serach" name="search" class="form-control" placeholder="Search">
                                            <button  class="btn btn-primary ml-2">
                                                search
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Phone No.</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $setting->name }}</td>
                                            <td>{{ $setting->email }}</td>
                                            <td>
                                                @if ($setting->userInfo)
                                                    <a href="{{ url($setting->userInfo->image) }}" target="_blank">
                                                        <img src="{{ url($setting->userInfo->image) }}" alt=""
                                                            width="100px">
                                                    </a>
                                                    {{-- <img src="{{ url( $setting->userInfo->image ) }}" alt="product_img" width="100" height="80"target="_blank"> --}}
                                                @else
                                                @endif
                                            </td>
                                            <td>{{ $setting->userInfo ? $setting->userInfo->phone_no : '-' }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ url('index/' . $setting->id) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ url('index/' . $setting->id . '/edit') }}">Edit</a>
                                                <a class="btn btn-danger"
                                                    href="{{ url('index/delete/' . $setting->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination mt-2">
                                {{ $settings->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
@endsection

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function() {
            var oTable = $('.show-search-bar').dataTable();

            $('#tablebody').on('click', '.delete-user', function(e) {
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: 'red',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }, function() {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        type: "DELETE",
                        url: "{{ url('/dashboard/user/') }}" + "/" + id,
                        dataType: 'json',
                        success: function(response) {
                            var nRow = $($object).parents('tr')[0];
                            oTable.fnDeleteRow(nRow);
                            swal('success', response.message, 'success');
                        },
                        error: function(e) {
                            swal('Oops...', 'Something went wrong!', 'error');
                        }
                    });
                });
            });
        });
    </script>
@endsection
