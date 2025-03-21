@extends('layouts.app')
@section('content')



<div class="page-content">
    <div class="container-fluid">

         

        <div class="row">
             
            <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category </h4>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <!-- Department Selection -->
                            <div class="mb-3">
                                <label>Category  </label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Choose Category</option>
                                    @foreach ($Category as $Department)
                                        <option value="{{ $Department->id }}" {{ old('category_id') == $Department->id ? 'selected' : '' }}>
                                            {{ $Department->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Employer Name -->
                            <div class="mb-3">
                                <label>Employer Name</label>
                                <input type="text" class="form-control" name="employer_name" placeholder="Enter employer name" value="{{ old('employer_name') }}" required>
                                @error('employer_name') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Employee Name -->
                          
                        
                            <!-- Designation -->
                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="{{ old('designation') }}">
                                @error('designation') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Location -->
                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter location" value="{{ old('location') }}">
                                @error('location') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label>Mobile No.</label>
                                <input type="text" class="form-control" name="mobile_no" placeholder="Enter mobile number" value="{{ old('mobile_no') }}" required pattern="\d{10}">
                                @error('mobile_no') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Email -->
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                @error('email') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Residential Address -->
                            <div class="mb-3">
                                <label>Residential Address</label>
                                <textarea class="form-control" name="residential_address" placeholder="Enter address">{{ old('residential_address') }}</textarea>
                                @error('residential_address') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Format Number -->
                            
                        
                            <!-- Submit & Reset Buttons -->
                            <div class="mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                        
                        

                    </div>
                </div>
                <!-- end card -->

                
                <!-- end card -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>


 

@endsection