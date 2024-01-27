@extends('layout')

@section('content')


            <div class="col-md-12">


               <div class="card">
                    <div class="card-header with-border align-items-left">
                    <strong> Create Task:</strong>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <form action="{{ route('task.store') }}" id="edit-task" method="POST">
                                                @csrf
                                                @method('POST')
                        
                                                <!-- Your form fields go here -->
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name:</label>
                                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Priority:</label>
                                                    <input type="number" name="priority" class="form-control" value="{{ old('priority') }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                   

            </div>
        </div>

    </div>


@endsection