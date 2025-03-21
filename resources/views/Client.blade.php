@extends('layouts.app')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Client</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Client</a></li>
                            <li class="breadcrumb-item active">Client</li>
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
                         
                        <a class="btn btn-primary" href="{{route('Client-add')}}"><i
                            class="icon-plus"></i>Add Client</a>
                    </div>
                    <div class="card-body">
                                  
                    @if(Session::has('status'))
                    <p class ='alert alert-success'>{{ Session::get('status') }}</p>
                    @endif

                        <table id="datatable-buttons" class="table table-hover table-bordered table-striped dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S no.</th>
                                    <th>Client/ Vendor </th>
                                    <th>Name  </th>
                                    <th>Designation  </th>
                                    <th>Name of Organization  </th>
                                    <th>Mobile  </th>
                                    <td>Email   </td>
                                    <th>Location </th>
                                    <th>Official Address  </th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Client as $index => $Actss)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                  
                                    <td>{{ $Actss->type}}</td>
                                    <td>{{ $Actss->name}}</td>
                                    <td>{{ $Actss->designation}}</td>
                                    <td>{{ $Actss->organization_name}}</td>
                                    <td>{{ $Actss->mobile_no }}</td>
                                    <td>{{ $Actss->email }}</td>
                                    <td>{{ $Actss->location}}</td>
                                    <td>{{ $Actss->official_address}}</td>
                           
                                 
                                    <td>
                                        <div class="list-icon-function">
                                            <a href="{{ route('Client.edit',['id' => $Actss->id])}} ">
                                                <div class="item edit">
                                                    <i class="fas fa-edit"></i>
                                                </div>
                                            </a>
                                            <form action="{{ route('Client.delete',['id' => $Actss->id])}}" method="POST">
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