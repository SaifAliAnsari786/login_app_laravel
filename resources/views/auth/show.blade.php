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
                    <h2>Add Product Details</h2>
                </div>
        @include('success.success')
        @include('error.error')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Enter Title" value="{{$setting->name }}" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" class="form-control" placeholder="Enter Title" value="{{$setting->email }}" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" name="phone_no" class="form-control" placeholder="Enter phone" value="{{$setting->userInfo->phone_no }}" >
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong> Image:</strong>
                        <input type="file" name="image" class="form-control" placeholder="Select Image"  >
                        <span>
                            <a href="{{url($setting->userInfo->image) }}" target="_blank">
                                <img src="{{url($setting->userInfo->image) }}" alt="" width="100px">
                            </a>
                        </span>
                    </div>
                </div>

            </div>
    </div>
</body>

</html>
