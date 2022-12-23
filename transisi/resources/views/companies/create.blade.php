@extends('layouts.app',['title' => 'Create Company'])
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Company</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Add Company
        </div>
        <div class="card-body">
            <form action="{{ route('company.create') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @method('POST')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
           
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                           <label for="logo">Logo</label>
                           <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                 <span class="input-group-text">Upload logo</span>
                              </div>
                              <div class="custom-file">
                                 <input type="file" accept="image/*" onchange="previewImage()" class="custom-file-input" id="logo" name="logo">
                                 <label class="custom-file-label">Choose File</label>
                              </div>
                           </div>
                           <div class="form-group text-center my-2" id="imgpreview">

                           </div>
                           @error('logo')
                               <span class="text-danger mt-2">{{ $message }}</span>
                           @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="website" id="website" value="{{ old('website') }}" placeholder="Link Website" class="form-control">
                            @error('website')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
             
                <div style="float:right" class="mr-1">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                    <a href="{{ route('company.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function previewImage() {
            $('#logo').get(0).files.length > 0 ? $('#imgpreview').empty() : '';
            $('#imgpreview').append("<img class='img-thumbnail' style='object-fit: cover' height='250' width='250' src='"+URL.createObjectURL(event.target.files[0])+"' alt=''/>");
        }
    </script>
@endsection