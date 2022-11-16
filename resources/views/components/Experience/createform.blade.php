<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="line-height: 36px;">Add Experience</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('instructor.experience.store') }}" method="POST">
            @csrf
            <input type="hidden" name="instructor_id" value="{{ $instructor->id }}">
            <div class="form-group">
                <label for="degreename">Degree Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="degreename" placeholder="Name">
                @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input name="year"  type="text" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Year">
                @error('year') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
                @error('description') <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus"></i> Create
                </button>
            </div>
        </form>
    </div>
</div>
