<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Company Form - Laravel 9 CRUD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add User Details</h2>
                </div>
                @include('success.success')
                @include('error.error')
                <form action={{ url('contacts/'.$setting->id) }}method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="user_id">Name</label>
                                <select name="user_id" id="name" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            @if ($setting->id == $user->id) selected @endif>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @if ($setting->contacts->count() > 0)
                            @foreach ($setting->contacts as $userContact)
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Phone No. {{ $loop->iteration }}:</strong>
                                        <input type="text" name="phone_no[]" class="form-control"
                                            placeholder="Enter phone" value="{{ $userContact->phone_no }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        {{-- <a class="btn btn-danger" href="{{ url('contacts/delete/' . $setting->id) }}">Submit</a> --}}
                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
                    </div>
                </form>
            </div>
</body>

</html>
