


<!-- Success Alert -->
    @if(session('success'))
      <div class="alert alert-success shadow-sm">
        {{ session('success') }}
      </div>
    @endif

    <!-- Card Wrapper -->
    <div class="row">
      <div class="col-12">
        <div class="card shadow rounded-4">
          <div class="card-body">


            <form action="{{ route('admin.investment-highlight.update') }}" method="POST">
              @csrf
              @method('PUT')

              <div class="row g-4">
                <div class="col-md-6">
                  <label class="form-label fw-semibold">🔤 Title</label>
                  <input type="text" name="title" class="form-control" value="{{ old('title', $highlight->title) }}">
                </div>

                <div class="col-md-6">
                  <label class="form-label fw-semibold">🔘 Button Text</label>
                  <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $highlight->button_text) }}">
                </div>

                <div class="col-12">
                  <label class="form-label fw-semibold">📝 Highlight Points</label>
                  <div id="points-wrapper">
                    @foreach(old('points', $highlight->points ?? ['']) as $point)
                      <div class="input-group mb-2">
                        <input type="text" name="points[]" class="form-control" value="{{ $point }}">
                        <button type="button" class="btn btn-danger remove-point"><i class="fas fa-trash"></i></button>
                      </div>
                    @endforeach
                  </div>
                  <button type="button" id="add-point" class="btn btn-sm btn-outline-primary mt-2">
                    ➕ Add Point
                  </button>
                </div>
              </div>

              <div class="text-end mt-4">
                <button type="submit" class="btn btn-success px-5 py-2 rounded-pill">
                  💾 Save Changes
                </button>
              </div>
            </form>

          </div> <!-- card-body -->
        </div> <!-- card -->
      </div> <!-- col -->
    </div> <!-- row -->


<!-- JS Script for Dynamic Points -->
<script>
  document.getElementById('add-point').addEventListener('click', function () {
    const wrapper = document.getElementById('points-wrapper');
    const div = document.createElement('div');
    div.className = 'input-group mb-2';
    div.innerHTML = `
      <input type="text" name="points[]" class="form-control">
      <button type="button" class="btn btn-danger remove-point"><i class="fas fa-trash"></i></button>
    `;
    wrapper.appendChild(div);
  });

  document.addEventListener('click', function (e) {
    if (e.target.closest('.remove-point')) {
      e.target.closest('.input-group').remove();
    }
  });
</script>
