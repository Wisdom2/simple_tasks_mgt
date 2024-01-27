@extends('layout')

@section('content')

            <div class="col-md-12">

               @if (! empty($task) )

               <div class="card">
                    <div class="card-header with-border align-items-left">
                    <strong> Task:</strong> {{ $task->name }}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <form action="{{ route('task.update', $task->id) }}" id="edit-task" method="POST">
                                                @csrf
                                                @method('PUT')
                        
                                                <!-- Your form fields go here -->
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name:</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $task->name }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Priority:</label>
                                                    <input type="number" name="priority" class="form-control"  value="{{ $task->priority }}" required>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Update Item</button>
                                            </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                   
               @endif

            </div>
        </div>

    </div>


    
@endsection