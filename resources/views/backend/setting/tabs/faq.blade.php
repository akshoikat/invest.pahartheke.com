

<!-- ✅ Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card shadow-sm rounded-4">
            <div class="card-header d-flex justify-content-between align-items-center  rounded-top-4">
                <h5 class="mb-0">📋 FAQ List</h5>
                <button class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createFaqModal">
                    ➕ Add FAQ
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($faqs as $key => $faq)
                                <tr data-id="{{ $faq->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $faq->question }}</td>
                                    <td><div class="faq-answer-preview">{{ Str::limit($faq->answer, 100) }}</div></td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editFaqModal{{ $faq->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this FAQ?');">
                                            @csrf 
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- ✏️ Edit Modal -->
                                <div class="modal fade" id="editFaqModal{{ $faq->id }}" tabindex="-1" aria-labelledby="editFaqModalLabel{{ $faq->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow rounded-4">
                                            <form action="{{ route('faqs.update', $faq->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header bg-info text-white rounded-top-4">
                                                    <h5 class="modal-title" id="editFaqModalLabel{{ $faq->id }}">✏️ Edit FAQ</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body bg-light">
                                                    <div class="row g-3">
                                                        <div class="col-md-12">
                                                            <label class="form-label fw-semibold">Question</label>
                                                            <input type="text" name="question" class="form-control" value="{{ $faq->question }}" required>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="form-label fw-semibold">Answer</label>
                                                            <textarea name="answer" class="form-control" rows="4" required>{{ $faq->answer }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light rounded-bottom-4">
                                                    <button type="submit" class="btn btn-info rounded-pill">💾 Update</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">❌ Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No FAQs found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- ➕ Add FAQ Modal -->
<div class="modal fade" id="createFaqModal" tabindex="-1" aria-labelledby="createFaqModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">
            <form action="{{ route('faqs.store') }}" method="POST">
                @csrf
                <div class="modal-header bg-success text-white rounded-top-4">
                    <h5 class="modal-title" id="createFaqModalLabel">➕ Add New FAQ</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Question</label>
                            <input type="text" name="question" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Answer</label>
                            <textarea name="answer" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light rounded-bottom-4">
                    <button type="submit" class="btn btn-success rounded-pill">💾 Save</button>
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">❌ Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

