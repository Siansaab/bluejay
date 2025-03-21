@extends('layouts.app')
@section('content')



<div class="page-content">
    <div class="container-fluid">
  
        <div class="row">
           
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Client/Vendor Details</h4>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('Client.store')}}" method="POST">
                            @csrf
                     
                            <div class="mb-3">
                                <label>Type</label>
                                <select class="form-control" name="type">
                                    <option value="client" {{ old('type') == 'client' ? 'selected' : '' }}>Client</option>
                                    <option value="vendor" {{ old('type') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                </select>
                                @error('type') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name') }}"/>
                                @error('name') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" class="form-control" placeholder="Enter designation" name="designation" value="{{ old('designation') }}"/>
                                @error('designation') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Name of Organization</label>
                                <input type="text" class="form-control" placeholder="Enter organization name" name="organization_name" value="{{ old('organization_name') }}"/>
                                @error('organization_name') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Mobile No.</label>
                                <input type="text" class="form-control" placeholder="Enter mobile number" name="mobile_no" value="{{ old('mobile_no') }}" maxlength="10"/>
                                @error('mobile_no') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Email ID</label>
                                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}"/>
                                @error('email') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Location</label>
                                <input type="text" class="form-control" placeholder="Enter location" name="location" value="{{ old('location') }}"/>
                                @error('location') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Official Address</label>
                                <textarea class="form-control" placeholder="Enter official address" name="official_address">{{ old('official_address') }}</textarea>
                                @error('official_address') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-0">
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
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