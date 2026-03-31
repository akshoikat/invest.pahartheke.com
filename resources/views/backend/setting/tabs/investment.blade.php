<!-- Success Message -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card-header d-flex justify-content-between align-items-center  rounded-top-4">
                <h5 class="mb-0">Investment Plan List</h5>
                <button class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#createPlanModal">
                    ➕ Add Plan
                </button>
            </div>
        <div class="card shadow-sm rounded-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Button Text</th>
                                <th>Form Link</th>
                                <th>image 1</th>
                                <th>image 2</th>
                                <th>image 2</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $key => $plan)
                                <tr data-id="{{ $plan->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $plan->title }}</td>
                                    <td>{{ Str::limit($plan->short_description, 60) }}</td>
                                    <td>{{ $plan->button_text ?? 'N/A' }}</td>
                                    <td>{{ $plan->apply_link ?? 'N/A' }}</td>
                                    <td >
                                        @if ($plan->image_1)
                                            <img style="width: 50px;height: 50px; border-radius: 50%;" src="{{ asset('storage/' . $plan->image_1) }}" alt="Image 1" width="80">
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if ($plan->image_2)
                                            <img style="width: 50px;height: 50px; border-radius: 50%;" src="{{ asset('storage/' . $plan->image_2) }}" alt="Image 2" width="80">
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if ($plan->image_3)
                                            <img style="width: 50px;height: 50px; border-radius: 50%;" src="{{ asset('storage/' . $plan->image_3) }}" alt="Image 3" width="80">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#editInvestmentModal{{ $plan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{ route('investment-plans.destroy', $plan->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Create Modal -->
                                <div class="modal fade" id="createPlanModal" tabindex="-1" aria-labelledby="createPlanModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow rounded-4">
                                            <form action="{{ route('investment-plans.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <div class="modal-header bg-success text-white rounded-top-4">
                                                    <h5 class="modal-title" id="createPlanModalLabel">➕ Add New Investment Plan</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body bg-light">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="title" class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                                                            <input type="text" name="title" id="title" class="form-control" required>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="button_text" class="form-label fw-semibold">Button Text</label>
                                                            <input type="text" name="button_text" id="button_text" class="form-control" value="View Details">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="button_apply" class="form-label fw-semibold">Apply Button Text</label>
                                                            <input type="text" name="button_apply" id="button_apply" class="form-control" value="Apply Now">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="apply_link" class="form-label fw-semibold">Apply Link (Google Form URL)</label>
                                                            <input type="url" name="apply_link" id="apply_link" class="form-control" placeholder="https://">
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="short_description" class="form-label fw-semibold">Short Description</label>
                                                            <textarea name="short_description" id="short_description" class="form-control" rows="2"></textarea>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="details" class="form-label fw-semibold">Details</label>
                                                            <textarea name="details" id="details" class="form-control" rows="4"></textarea>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="image_1" class="form-label fw-semibold">Image 1</label>
                                                            <input type="file" name="image_1" id="image_1" class="form-control" accept="image/*">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="image_2" class="form-label fw-semibold">Image 2</label>
                                                            <input type="file" name="image_2" id="image_2" class="form-control" accept="image/*">
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="image_3" class="form-label fw-semibold">Image 3</label>
                                                            <input type="file" name="image_3" id="image_3" class="form-control" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer bg-light rounded-bottom-4">
                                                    <button type="submit" class="btn btn-success rounded-pill">💾 Save Plan</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Edit Modal -->
                                <div class="modal fade" id="editInvestmentModal{{ $plan->id }}" tabindex="-1" aria-labelledby="editInvestmentModalLabel{{ $plan->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow rounded-4">
                                            <form action="{{ route('investment-plans.update', $plan->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header bg-info text-white rounded-top-4">
                                                    <h5 class="modal-title" id="editInvestmentModalLabel{{ $plan->id }}">Edit Investment Plan</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body bg-light">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Title</label>
                                                            <input type="text" name="title" class="form-control" value="{{ $plan->title }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Button Text</label>
                                                            <input type="text" name="button_text" class="form-control" value="{{ $plan->button_text }}">
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Apply Button Text</label>
                                                            <input type="text" name="button_apply" class="form-control" value="{{ $plan->button_apply }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Apply Link (Google Form)</label>
                                                            <input type="url" name="apply_link" class="form-control" value="{{ $plan->apply_link }}">
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Short Description</label>
                                                            <textarea name="short_description" class="form-control" rows="2">{{ $plan->short_description }}</textarea>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Details</label>
                                                            <textarea name="details" class="form-control" rows="4">{{ $plan->details }}</textarea>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Image 1</label>
                                                            <input type="file" name="image_1" class="form-control">
                                                            @if ($plan->image_1)
                                                                <img src="{{ asset('storage/' . $plan->image_1) }}" class="img-thumbnail mt-1" width="100">
                                                            @endif
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Image 2</label>
                                                            <input type="file" name="image_2" class="form-control">
                                                            @if ($plan->image_2)
                                                                <img src="{{ asset('storage/' . $plan->image_2) }}" class="img-thumbnail mt-1" width="100">
                                                            @endif
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label fw-semibold">Image 3</label>
                                                            <input type="file" name="image_3" class="form-control">
                                                            @if ($plan->image_3)
                                                                <img src="{{ asset('storage/' . $plan->image_3) }}" class="img-thumbnail mt-1" width="100">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer bg-light rounded-bottom-4">
                                                    <button type="submit" class="btn btn-info rounded-pill">💾 Update</button>
                                                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No investment plans found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
