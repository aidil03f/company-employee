@extends('layouts.app',['title' => 'Create Employee'])
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Employee</h1>

    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header py-3">
                Add Employee
            </div>
            <div class="card-body">
                <form action="{{ route('employee.create') }}" method="post" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                        @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <select name="company" id="company" class="form-control" required>
                          
                        </select>
                        @error('company')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
        
                    <div style="float:right" class="mr-1">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                        <a href="{{ route('employee.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $.get('/companies',function(response){
                $('#company').append("<option disabled selected>Choose One!</option>");
                  $.each(response.data, function (i, item) {
                    $('#company').append($('<option>', {
                        value: item.id,
                        text : item.name
                    }));
                });
            });
        });
    </script>
@endsection