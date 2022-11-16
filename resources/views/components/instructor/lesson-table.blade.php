<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Chapter Wise Lesson List</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($chapters as $chapter)
                    <li class="nav-item mr-1" role="presentation">
                        <a class="nav-link " id="chapter-tab" data-toggle="pill" href="#chapter-{{ $chapter->id }}"
                            role="tab" aria-controls="chapter" aria-selected="true">{{ $chapter->name }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($chapters as $chapter)
                    <div class="tab-pane fade " id="chapter-{{ $chapter->id }}" role="tabpanel"
                        aria-labelledby="chapter-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Duration</th>
                                    <th>Video Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @foreach ($lessons as $lesson)
                                    @if ($lesson->chapter_id == $chapter->id)
                                        <tr data-id="{{ $chapter->id }}">
                                            <td width="10%">{{ $loop->iteration }}</td>
                                            <td width="20%">{{ $lesson->lesson_name }}</td>
                                            <td width="15%">{{ $lesson->duration }} Minutes</td>
                                            <td width="15%">{{ ucwords($lesson->video_type) }}</td>
                                            <td width="25%">
                                                <a href="{{ route('instructor.chapter.lesson.edit', $lesson->id) }}"
                                                    title="Edit Lesson" class="btn bg-info"><i
                                                        class="fas fa-edit"></i></a>
                                                <form
                                                    action="{{ route('instructor.chapter.lesson.delete', $lesson->id) }}"
                                                    method="POST" class="d-inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button title="Delete Lesson"
                                                        onclick="return confirm('Are you sure you want to delete this item?');"
                                                        class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                                <div class="handle btn btn-success"><i class="fas fa-hand-rock"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
