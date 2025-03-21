@extends('layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Department</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Add Department</a></li>
                            <li class="breadcrumb-item active">Department</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                         
                        <a class="btn btn-primary" href="{{ route('department-add')}}"><i
                            class="icon-plus"></i>Add Department</a>
                    </div>
                    <div class="card-body">
                                  
                    @if(Session::has('status'))
                    <p class ='alert alert-success'>{{ Session::get('status') }}</p>
                    @endif

                        <table id="datatable-buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($department as $department)
                                <tr>
                                    <td>{{ $department->name}}</td>
                                    <td>{{ $department->slug}}</td>
                                    <td>{{ $department->status}}</td>
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('department.edit',['id' => $department->id])}}">
                                                <div class="item edit">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('department.delete', ['id' => $department->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="item text-danger delete" style='cursor: pointer;'>
                                                    <i class="fas fa-trash"></i>
                                                </div>
                                            </form>
                                            
                                           
                                            
                                        </div>
                                    </td>
                                     
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>



@push('scripts')
 
<script>
    $(function(){
        $('.delete').on('click', function(e){
            e.preventDefault();
            var form = $(this).closest('form');
            swal({
                title: "Are you sure?",
                text: "You want to delete the records?",
                icon: 'warning',
                buttons: ['No', 'Yes'],
                dangerMode: true,
            }).then(function(result){
                if (result) {
                    form.submit();
                }
            });
        });
    });
</script>
    
@endpush
@endsection