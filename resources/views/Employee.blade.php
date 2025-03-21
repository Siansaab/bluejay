@extends('layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Employee</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employee</a></li>
                            <li class="breadcrumb-item active">Employee</li>
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
                         
                        <a class="btn btn-primary" href="{{route('Employee-add')}}"><i
                            class="icon-plus"></i>Add Employee</a>
                    </div>
                    <div class="card-body">
                                  
                    @if(Session::has('status'))
                    <p class ='alert alert-success'>{{ Session::get('status') }}</p>
                    @endif

                        <table id="datatable-buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Category</th>
                                    <th>Name of Employer  </th>
                                    <th>Designation  </th>
                                    <th>Location of posting </th>
                                    <th>Mobile No. </th>
                                    <td>Email ID  </td>
                                    <td>Residential Address   </td>
                                     
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Employee as $index => $Actss)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                      <td>{{ $Actss->Category->name }}</td>
                                    <td>{{ $Actss->employer_name}}</td>
                                    <td>{{ $Actss->designation}}</td>
                                    <td>{{ $Actss->location}}</td>
                                    <td>{{ $Actss->mobile_no}}</td>
                                    <td>{{ $Actss->email}}</td>
                                    <td>{{ $Actss->residential_address}}</td>
                                   
                                     
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('Employee.edit',['id' => $Actss->id])}} ">
                                                <div class="item edit">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('Employee.delete',['id' => $Actss->id])}}" method="POST">
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