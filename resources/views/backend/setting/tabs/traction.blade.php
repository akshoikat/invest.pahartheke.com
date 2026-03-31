<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<!-- Add New Traction Form -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('traction.store') }}" method="POST">
            @csrf
            <div class="row g-2 align-items-center">
                <div class="col-md-3">
                    <select name="icon" class="form-select" required>
                        <option value="fas fa-shopping-cart">🛒 shopping-cart</option>
                        <option value="fas fa-clipboard-list">📋 clipboard-list</option>
                        <option value="fas fa-chart-line">📈 chart-line</option>
                        <option value="fas fa-user-friends">👥 user-friends</option>
                        <option value="fas fa-store">🏬 store</option>
                        <option value="fas fa-copy">📄 copy</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="highlight" class="form-control" placeholder="e.g. 600+" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="description" class="form-control" placeholder="e.g. Orders Per Day" required>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success w-100">
                        <i class="bi bi-plus-circle me-1"></i> Add Traction
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Traction List -->
<div class="row">
    @foreach($tractions as $traction)
        <div class="col-md-6 col-lg-3 mb-4">
            <div class="card shadow-sm border border-light h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                            <i class="{{ $traction->icon }} fs-5"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">{{ $traction->highlight }}</h5>
                            <p class="mb-0 text-muted small">{{ $traction->description }}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-auto">
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $traction->id }}">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </button>
                        <form action="{{ route('traction.destroy', $traction->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-trash me-1"></i> Delete
                            </button>
                        </form>

                        <div class="modal fade" id="editModal{{ $traction->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $traction->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <form method="POST" action="{{ route('traction.update', $traction->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="editModalLabel{{ $traction->id }}">
                        <i class="bi bi-pencil-square me-1"></i> Edit Traction
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    <select name="icon" class="form-select mb-2" required>
                        <option value="fas fa-shopping-cart" {{ $traction->icon == 'fas fa-shopping-cart' ? 'selected' : '' }}>🛒 shopping-cart</option>
                        <option value="fas fa-clipboard-list" {{ $traction->icon == 'fas fa-clipboard-list' ? 'selected' : '' }}>📋 clipboard-list</option>
                        <option value="fas fa-chart-line" {{ $traction->icon == 'fas fa-chart-line' ? 'selected' : '' }}>📈 chart-line</option>
                        <option value="fas fa-user-friends" {{ $traction->icon == 'fas fa-user-friends' ? 'selected' : '' }}>👥 user-friends</option>
                        <option value="fas fa-store" {{ $traction->icon == 'fas fa-store' ? 'selected' : '' }}>🏬 store</option>
                        <option value="fas fa-copy" {{ $traction->icon == 'fas fa-copy' ? 'selected' : '' }}>📄 copy</option>
                    </select>
                    <input type="text" name="highlight" value="{{ $traction->highlight }}" class="form-control mb-2" required>
                    <input type="text" name="description" value="{{ $traction->description }}" class="form-control mb-2" required>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button type="submit" class="btn btn-primary rounded-pill">💾 Save</button>
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">❌ Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Edit Modals Outside the Loop -->
@foreach($tractions as $traction)

@endforeach
