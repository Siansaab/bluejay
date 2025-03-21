@extends('layouts.app')
@section('content')



<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
         
        <!-- end page title -->

        <div class="row">
             
            <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">code</h4>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('Employee.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                @method('PUT')
                 <input type="hidden" name='id' value="{{ $Employee->id }}">
                        
                            <div class="mb-3">
                                <label>Category   </label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Choose Category</option>
                                    @foreach ($Category as $Departments)
                                        <option value="{{ $Departments->id }}" {{ $Employee->category_id  == $Departments->id ? 'selected' : '' }}>
                                            {{ $Departments->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                          
                        
                            <div class="mb-3">
                                <label>Employer Name</label>
                                <input type="text" class="form-control" name="employer_name" placeholder="Enter employer name" value="{{ $Employee->employer_name }}" required>
                                @error('employer_name') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                         
                            <!-- Designation -->
                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" placeholder="Enter designation" value="{{ $Employee->designation }}">
                                @error('designation') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Location -->
                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" class="form-control" name="location" placeholder="Enter location" value="{{ $Employee->location }}">
                                @error('location') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Mobile Number -->
                            <div class="mb-3">
                                <label>Mobile No.</label>
                                <input type="text" class="form-control" name="mobile_no" placeholder="Enter mobile number" value="{{ $Employee->mobile_no }}" required pattern="\d{10}">
                                @error('mobile_no') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Email -->
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{ $Employee->email }}">
                                @error('email') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <!-- Residential Address -->
                            <div class="mb-3">
                                <label>Residential Address</label>
                                <textarea class="form-control" name="residential_address" placeholder="Enter address">{{ $Employee->residential_address }}</textarea>
                                @error('residential_address') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                             
                            
                        
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




@push('scripts')
<script>
    $(function() {
        

        // Automatically generate slug from the name input
        $("input[name='name']").on("input", function() {
            $("input[name='slug']").val(stringToSlug($(this).val()));
        });

        // Function to convert text to slug
        function stringToSlug(text) {
            return text
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-') // Replace non-alphanumeric characters with a hyphen
                .replace(/^-+|-+$/g, '');   // Remove leading and trailing hyphens
        }
    });
</script>

    
@endpush

@endsection