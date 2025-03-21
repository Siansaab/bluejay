@extends('layouts.app')
@section('content')



<div class="page-content">
    <div class="container-fluid">

         

        <div class="row">
             
            <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Books</h4>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('book.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label>Department Name </label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">Choose Department</option>
                                    @foreach ($Department as $Departments)
                                        <option value="{{ $Departments->id }}" {{ old('Departments_id') == $Departments->id ? 'selected' : '' }}>
                                            {{ $Departments->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                         
                        
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Enter description" name="descrption">{{ old('descrption') }}</textarea>
                                @error('descrption') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Upload PDF</label>
                                <input type="file" class="form-control" name="pdf" accept=".pdf" />
                                @error('pdf') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ old('status') == 'deactive' ? 'selected' : '' }}>Deactive</option>
                                </select>
                                @error('status') 
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