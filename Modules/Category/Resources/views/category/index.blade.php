@extends('layouts.admin')
@section('title') Category List | Admin @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Category List</h3>
                        <a href="{{ route('module.category.create') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-plus"></i>&nbsp;Add Category</a>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        role="grid" aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="10%">Thumbnail</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="40%">Category Name</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Rendering engine: activate to sort column ascending"
                                                    aria-sort="descending" width="25%">Icon</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                    width="25%"> Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sortable">
                                            @foreach ($categories as $category)
                                                <tr data-id="{{ $category->id }}" role="row" class="odd">
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <img src="{{ asset($category->thumbnail) }}" height="50px"
                                                            width="50px" alt="thumbnail">
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">{{ $category->name }}
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0"><i
                                                            class="{{ $category->icon }}"></i>
                                                    </td>
                                                    <td class="sorting_1 text-center" tabindex="0">
                                                        <a data-toggle="tooltip" data-placement="top" title="Edit Bed"
                                                            href="{{ route('module.category.edit', $category->id) }}"
                                                            class="btn bg-info"><i class="fas fa-edit"></i></a>
                                                        <form
                                                            action="{{ route('module.category.destroy', $category->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button data-toggle="tooltip" data-placement="top"
                                                                title="Delete Bed"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                        <div class="handle btn btn-success"><i class="fas fa-hand-rock"></i>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('script')
    <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            $("#sortable").sortable({
                items: 'tr',
                cursor: 'move',
                opacity: 0.4,
                scroll: false,
                dropOnEmpty: false,
                update: function() {
                    sendTaskOrderToServer('#sortable tr');
                },
                classes: {
                    "ui-sortable": "highlight"
                },
            });
            $("#sortable").disableSelection();

            function sendTaskOrderToServer(selector) {
                var order = [];
                $(selector).each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('module.category.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        toastr.success(response.message, 'Success');
                    }
                });
            }
        });
    </script>
@endsection
