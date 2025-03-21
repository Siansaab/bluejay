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
                        <form class="custom-validation" action="{{ route('code.update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                @method('PUT')
                 <input type="hidden" name='id' value="{{ $code->id }}">
                        
                            <div class="mb-3">
                                <label>Department Name </label>
                                <select name="department_id" class="form-control" required>
                                    <option value="">Choose Department</option>
                                    @foreach ($Department as $Departments)
                                        <option value="{{ $Departments->id }}" {{ $code->department_id  == $Departments->id ? 'selected' : '' }}>
                                            {{ $Departments->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                          
                        
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" placeholder="Enter description" name="descrption">{{ $code->descrption }}</textarea>
                                @error('descrption') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Issuing Authority</label>
                                <input type="text" class="form-control" name="issuing_authority" placeholder="Enter issuing authority" value="{{ $code->issuing_authority }}" required>
                                @error('issuing_authority') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Year of Issue</label>
                                <input type="number" class="form-control" name="year_of_issue" placeholder="Enter year of issue" value="{{ $code->year_of_issue }}" min="1900" max="{{ date('Y') }}" required>
                                @error('year_of_issue') 
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
                                    <option value="active" {{ $code->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ $code->status  == 'deactive' ? 'selected' : '' }}>Deactive</option>
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