@extends('layouts.backend.app')

@section('content')

<style>
.tab-content > .tab-pane {
    padding: 1rem 0;
    min-height: 200px;
    border: none;
}

.nav-tabs {
    margin-bottom: 0;
    flex-wrap: wrap;
    justify-content: center;
}

.tab-pane.fade {
    display: none;
}
.tab-pane.fade.show.active {
    display: block;
}

.nav-tabs .nav-item {
    margin-bottom: 0.5rem;
}

.nav-tabs .nav-link {
    text-align: center;
    padding: 0.5rem 0.75rem;
}
</style>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Explore Sections</h4>
                <p class="card-title-desc">Manage all dynamic sections such as Site Settings, Banner, FAQ, Fact Sheet, etc. from one place.</p>

                <!-- Nav tabs -->
                <div class="table-responsive">
                    <ul class="nav nav-tabs d-flex flex-wrap justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#site" role="tab">
                                <span class="d-none d-md-block">Site Setting</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-web h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#banner" role="tab">
                                <span class="d-none d-md-block">Banner</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-image-area h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#investment" role="tab">
                                <span class="d-none d-md-block">Investment Plan</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-cash-multiple h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#faq" role="tab">
                                <span class="d-none d-md-block">FAQ</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-comment-question-outline h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#factsheet" role="tab">
                                <span class="d-none d-md-block">Fact Sheet</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-file-document h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#traction" role="tab">
                                <span class="d-none d-md-block">Traction</span>
                                <span class="d-block d-md-none"><i class="mdi mdi-chart-line h5"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="site" role="tabpanel">
                        @include('backend.setting.tabs.SiteSetting')
                    </div>
                    <div class="tab-pane fade" id="banner" role="tabpanel">
                        @include('backend.setting.tabs.banner')
                    </div>
                    <div class="tab-pane fade" id="investment" role="tabpanel">
                        @include('backend.setting.tabs.investment')
                    </div>
                    <div class="tab-pane fade" id="faq" role="tabpanel">
                        @include('backend.setting.tabs.faq')
                    </div>
                    <div class="tab-pane fade" id="factsheet" role="tabpanel">
                        @include('backend.setting.tabs.factsheet')
                    </div>
                    <div class="tab-pane fade" id="traction" role="tabpanel">
                        @include('backend.setting.tabs.traction')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
