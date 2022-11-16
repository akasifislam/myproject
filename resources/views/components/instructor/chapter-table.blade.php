<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="line-height: 36px;">Chapter List</h3>
    </div>
    <div class="card-body">
        @if ($chapters->count())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="sortable">
                    @foreach ($chapters as $chapter)
                        <tr data-id="{{ $chapter->id }}">
                            <td width="10%">{{ $loop->iteration }}</td>
                            <td width="65%">{{ $chapter->name }}</td>
                            <td width="25%">
                                <a title="Edit Chapter"
                                    href="{{ route('instructor.course.chapter.edit', $chapter->id) }}"
                                    class="btn bg-info"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('instructor.course.chapter.delete', $chapter->id) }}"
                                    method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button title="Delete Chapter"
                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                        class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                <div class="handle btn btn-success"><i class="fas fa-hand-rock"></i></div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            No data found
        @endif
    </div>
</div>
