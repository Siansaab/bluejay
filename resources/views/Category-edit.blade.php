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
                        <h4 class="card-title">Category</h4>
                    </div>
                    <div class="card-body">
                        <form class="custom-validation" action="{{ route('Category.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                             <input type="hidden" name='id' value="{{ $Category->id }}">
                            <div class="mb-3">
                                <label>Category Name </label>
                                <input type="text" class="form-control" placeholder="Enter the Category Name" name="name" value="{{ $Category->name }}" />
                                @error('name') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label>Slug</label>
                                <input type="text" class="form-control" placeholder="Slug" name="slug" value="{{ $Category->slug }}"/>
                                @error('slug') 
                                    <span class="alert alert-danger text-center">{{ $message }}</span>
                                @enderror
                            </div>
                        
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="active" {{ $Category->status == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ $Category->status == 'deactive' ? 'selected' : '' }}>Deactive</option>
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