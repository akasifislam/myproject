<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="20%">Degree</th>
                <th width="15%">Year</th>
                <th width="45%">Description</th>
                <th width="20%">Action</th>
            </tr>
        </thead>
        <tbody id="sortable">
            @forelse ($educations as $education)
                <tr data-id="{{ $education->id }}">
                    <td>{{ $education->name }}</td>
                    <td>{{ $education->year }}</td>
                    <td>{{ $education->description }}</td>
                    <td>
                        <a data-toggle="tooltip" data-placement="top" title="Edit Education" href="{{ route('instructor.education.edit', $education->id) }}" class="btn bg-info"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('instructor.education.delete', $education->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button data-toggle="tooltip" data-placement="top" title="Delete Education" onclick="return confirm('Are you sure you want to delete this item?');" class="btn bg-danger"><i class="fas fa-trash"></i></button>
                        </form>
                        <div class="handle btn btn-success"><i class="fas fa-hand-rock"></i></div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nothing Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
