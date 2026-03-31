@extends('layouts.backend.app')

@section('content')

<div class="p-6">
    <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
        <h4 class="text-2xl font-semibold mb-2 text-gray-800 dark:text-gray-100">Explore Sections</h4>
        <p class="text-gray-500 dark:text-gray-400 mb-6">
            Manage all dynamic sections such as Site Settings, Banner, FAQ, Fact Sheet, etc. from one place.
        </p>

        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar Tabs -->
            <div class="md:w-1/4 flex md:flex-col space-x-4 md:space-x-0 md:space-y-2 overflow-x-auto">
                <button class="tab-btn active flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="site">
                    <i class="mdi mdi-web text-xl"></i>
                    <span class="font-medium">Site Setting</span>
                </button>
                <button class="tab-btn flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="banner">
                    <i class="mdi mdi-image-area text-xl"></i>
                    <span class="font-medium">Banner</span>
                </button>
                <button class="tab-btn flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="investment">
                    <i class="mdi mdi-cash-multiple text-xl"></i>
                    <span class="font-medium">Investment Plan</span>
                </button>
                <button class="tab-btn flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="faq">
                    <i class="mdi mdi-comment-question-outline text-xl"></i>
                    <span class="font-medium">FAQ</span>
                </button>
                <button class="tab-btn flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="factsheet">
                    <i class="mdi mdi-file-document text-xl"></i>
                    <span class="font-medium">Fact Sheet</span>
                </button>
                <button class="tab-btn flex items-center gap-2 p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all" data-tab="traction">
                    <i class="mdi mdi-chart-line text-xl"></i>
                    <span class="font-medium">Traction</span>
                </button>
            </div>

            <!-- Tab Contents -->
            <div class="md:w-3/4 bg-gray-50 dark:bg-gray-800 rounded-lg p-4 transition-all duration-300">
                <div class="tab-content">
                    <div class="tab-panel active" id="site">
                        @include('backend.setting.tabs.SiteSetting')
                    </div>
                    <div class="tab-panel" id="banner">
                        @include('backend.setting.tabs.banner')
                    </div>
                    <div class="tab-panel" id="investment">
                        @include('backend.setting.tabs.investment')
                    </div>
                    <div class="tab-panel" id="faq">
                        @include('backend.setting.tabs.faq')
                    </div>
                    <div class="tab-panel" id="factsheet">
                        @include('backend.setting.tabs.factsheet')
                    </div>
                    <div class="tab-panel" id="traction">
                        @include('backend.setting.tabs.traction')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.tab-content .tab-panel {
    display: none;
    opacity: 0;
    transform: translateY(10px);
    transition: all 0.3s ease;
}
.tab-content .tab-panel.active {
    display: block;
    opacity: 1;
    transform: translateY(0);
}
.tab-btn.active {
    background-color: #f0f0f0;
    dark: #1f2937;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.tab-btn');
    const panels = document.querySelectorAll('.tab-panel');

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active from all buttons
            buttons.forEach(b => b.classList.remove('active'));
            // Add active to clicked
            btn.classList.add('active');

            const tab = btn.getAttribute('data-tab');

            // Show relevant panel
            panels.forEach(panel => {
                if(panel.id === tab){
                    panel.classList.add('active');
                } else {
                    panel.classList.remove('active');
                }
            });
        });
    });
});
</script>

@endsection