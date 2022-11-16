 <div class="card">
     <div class="card-header">
         <h3 class="card-title" style="line-height: 36px;">Edit Education</h3>
     </div>
     <div class="card-body">
         <form action="{{ route('instructor.education.update', $education->id) }}" method="POST">
             @csrf
             @method('PUT')
             <input type="hidden" name="instructor_id" value="{{ $education->instructor_id }}">
             <div class="form-group">
                <label for="degreename2">Degree Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="degreename2" placeholder="Name" value="{{ $education->name }}">
                @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
             </div>
             <div class="form-group">
                <label for="year">Year</label>
                <input name="year" type="text" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Year" value="{{ $education->year }}">
                @error('year') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
             </div>
             <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $education->description }}</textarea>
                @error('description') <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span> @enderror
             </div>
             <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-sync"></i> Update
                </button>
                <a class="btn btn-danger" href="{{ route('instructor.activity', $education->instructor_id) }}">
                    <i class="fas fa-times"></i> Cancel Edit
                </a>
             </div>
         </form>
     </div>
 </div>
