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
                    <div class="card card-primary card-outline card-tabs">
                        <div class="card-body">
                            @include('success.success')
                            @include('error.error')
                            <h3>
                                {{-- <a href="{{ url('contacts/create') }}" class="add-user-table btn btn-sm btn-primary">Add New
                                    &nbsp;<i class="fa fa-plus"></i></a> --}}
                                    <a href="{{ url('contacts/create') }}">
                                    <button type="button" class="btn btn-success">Add</button>
                                </a>

                                </h3>
                            <table id="dataTable" class="table table-bordered table-striped show-search-bar">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Phone No.</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">
                                    @foreach ($settings as $setting)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $setting->name }}</td>
                                            <td>
                                            @if ($setting->contacts->count() > 0)
                                                @foreach ($setting->contacts as $UserContact)
                                                    <li>{{ $UserContact->phone_no }}</li>
                                                @endforeach
                                            @else
                                                No phone records
                                            @endif
                                            </td>
                                            <td>
                                            <a class="btn btn-primary" href="{{ url('index/' . $setting->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ url('contacts/' . $setting->id . '/edit') }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('contacts/delete/' . $setting->id) }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('footer_js')
    {{-- <script type="text/javascript">
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
    </script> --}}
@endsection
