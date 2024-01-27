@extends('layout')

@section('content')


            <div class="col-md-12">

                <div class="card">
                    <div class="card-header with-border d-flex justify-content-between align-items-center">
                        Drag Drop To changes Tasks

                        <a href="/tasks/create" class="btn btn-info text-white">Create</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul id="task_sortable" class="task_list_ul">
                                            @foreach ($tasks as $task)
                                                <li class="ui-state-default" data-id="{{ $task->id }}">
                                                    <span class="task_num">{{ $loop->index + 1 }}</span>
                                                    <span>{{ $task->name }}</span>
                                                    <span>{{ $task->updated_at->format('Y-d-m g:i:s') }}</span>
                                                    <span class="d-flex justify-content-end">
                                                    <a href="/tasks/{{$task->id}}" class="btn btn-primary btn-edit" type="button" target="_blank" rel="noopener noreferrer">Edit</a>
                                                         &nbsp;
                                                        <button class="text-danger btn-del" data-id="{{ $task->id }}">Delete</button>
                                                    </span>

                                                </li>
                                            @endforeach
                                            </li>
                                        </ul>

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


    <script>

     $(document).ready(function() {
            $("#task_sortable").sortable({
                placeholder: "ui-state-highlight",
                update: function(event, ui) {
                    //var data = $(this).sortable('toArray');

                    var task_order_ids = new Array();
                    $('#task_sortable li').each(function() {
                        task_order_ids.push($(this).data("id"));
                    });

                    console.log(task_order_ids);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('task.reorganize') }}",
                        dataType: "json",
                        data: {
                            order: task_order_ids,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            toastr.success(response.message);
                            $('#task_sortable li').each(function(index) {
                                $(this).find('.pos_num').text(index + 1);

                                //console.log(index);
                            });

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });


        $(document).ready(function() {
          $('.btn-del').on('click', function(event) {

            var clickedElement = event.target;

            // Get the data-id attribute value
            var dataIdValue = $(clickedElement).data('id');

            var resourceId = dataIdValue; 

            console.log(dataIdValue);

            $.ajax({
                url: '/tasks/' + resourceId,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response) {
                    toastr.success(response.message);
                    console.log(response.message);
                    location.reload(true);
                },
                error: function(error) {
                    toastr.success(response.message);
                    console.error('Error deleting resource:', error);
                }
            });
        });
    });

        
    </script>
    
@endsection