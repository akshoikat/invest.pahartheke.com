


 @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Add New Fact Form -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        

                        <form action="{{ route('fact-sheets.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Icon</label>
                                    <select name="icon" class="form-select" required>
                                        <option value="fas fa-hand-holding-usd">💰 hand-holding-usd</option>
                                        <option value="fas fa-credit-card">💳 credit-card</option>
                                        <option value="fas fa-users">👥 users</option>
                                        <option value="fas fa-tractor">🚜 tractor</option>
                                        <option value="fas fa-chart-line">📈 chart-line</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Highlight Text</label>
                                    <input type="text" name="highlight_text" class="form-control" placeholder="e.g. 153.8 Million" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="description" class="form-control" placeholder="e.g. Investments Raised Over The Years" required>
                                </div>
                                <div class="col-md-2 d-grid align-items-end">
                                    <button class="btn btn-success">
                                        <i class="bi bi-plus-circle me-1"></i> Add Fact
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Fact List -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <div class="row g-3">
                            @forelse($facts as $fact)
                                <div class="col-md-6 col-lg-3">
                                    <div class="card h-100 shadow-sm border border-light">
                                        <div class="card-body d-flex flex-column justify-content-between">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                                    <i class="{{ $fact->icon }} fs-5"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-bold">{{ $fact->highlight_text }}</h6>
                                                    <small class="text-muted">{!! nl2br(e($fact->description)) !!}</small>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between mt-auto pt-3 border-top">
                                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $fact->id }}">
                                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                                </button>
                                                <form action="{{ route('fact-sheets.destroy', $fact->id) }}" method="POST" onsubmit="return confirm('Delete this fact?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $fact->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="{{ route('fact-sheets.update', $fact->id) }}">
                                                @csrf @method('PUT')
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title">
                                                        <i class="bi bi-pencil-square me-1"></i> Edit Fact
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Icon</label>
                                                        <select name="icon" class="form-select">
                                                            <option value="fas fa-hand-holding-usd" {{ $fact->icon == 'fas fa-hand-holding-usd' ? 'selected' : '' }}>💰</option>
                                                            <option value="fas fa-credit-card" {{ $fact->icon == 'fas fa-credit-card' ? 'selected' : '' }}>💳</option>
                                                            <option value="fas fa-users" {{ $fact->icon == 'fas fa-users' ? 'selected' : '' }}>👥</option>
                                                            <option value="fas fa-tractor" {{ $fact->icon == 'fas fa-tractor' ? 'selected' : '' }}>🚜</option>
                                                            <option value="fas fa-chart-line" {{ $fact->icon == 'fas fa-chart-line' ? 'selected' : '' }}>📈</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Highlight Text</label>
                                                        <input type="text" name="highlight_text" value="{{ $fact->highlight_text }}" class="form-control">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label class="form-label">Description</label>
                                                        <input type="text" name="description" value="{{ $fact->description }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">💾 Save</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">❌ Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No facts found.</p>
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>

