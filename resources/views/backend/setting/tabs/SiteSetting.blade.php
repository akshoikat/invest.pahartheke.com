
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">

                            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Branding Info -->
                                <h5 class="fw-semibold mb-3">Branding</h5>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Logo</label>
                                        <input type="file" name="logo" class="form-control">
                                        @if($setting->logo)
                                            <img src="{{ asset('storage/' . $setting->logo) }}" class="mt-2 rounded" height="50" alt="Logo">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Company Name</label>
                                        <input type="text" name="company_name" value="{{ old('company_name', $setting->company_name) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-12 mt-3">
                                        <label class="form-label">Company Description</label>
                                        <textarea name="company_description" rows="3" class="form-control">{{ old('company_description', $setting->company_description) }}</textarea>
                                    </div>
                                </div>

                                <!-- Customer Care -->
                                <h5 class="fw-semibold mb-3 mt-4">📞 Customer Care</h5>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Phone 1</label>
                                        <input type="text" name="customer_care_phone_1" value="{{ old('customer_care_phone_1', $setting->customer_care_phone_1) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Phone 2</label>
                                        <input type="text" name="customer_care_phone_2" value="{{ old('customer_care_phone_2', $setting->customer_care_phone_2) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="customer_care_email" value="{{ old('customer_care_email', $setting->customer_care_email) }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Corporate -->
                                <h5 class="fw-semibold mb-3 mt-4">🏢 Corporate</h5>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="corporate_phone" value="{{ old('corporate_phone', $setting->corporate_phone) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="corporate_email" value="{{ old('corporate_email', $setting->corporate_email) }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Investment -->
                                <h5 class="fw-semibold mb-3 mt-4">💼 Investment</h5>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Phone</label>
                                        <input type="text" name="investment_phone" value="{{ old('investment_phone', $setting->investment_phone) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="investment_email" value="{{ old('investment_email', $setting->investment_email) }}" class="form-control">
                                    </div>
                                </div>

                                <!-- General Info -->
                                <h5 class="fw-semibold mb-3 mt-4">🌐 General Info</h5>
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label class="form-label">Office Address</label>
                                        <input type="text" name="office_address" value="{{ old('office_address', $setting->office_address) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">General Email</label>
                                        <input type="email" name="general_email" value="{{ old('general_email', $setting->general_email) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Google Play Link</label>
                                        <input type="url" name="google_play_link" value="{{ old('google_play_link', $setting->google_play_link) }}" class="form-control">
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-success px-5 py-2">
                                        <i class="mdi mdi-content-save-outline me-1"></i> Save Settings
                                    </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
