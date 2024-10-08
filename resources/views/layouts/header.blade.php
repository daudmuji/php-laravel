<div id="kt_header" class="header align-items-stretch" data-kt-sticky="true" data-kt-sticky-name="header"
    data-kt-sticky-offset="{default: '200px', lg: '300px'}">
    <div class="container-xxl d-flex align-items-center">
        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px"
                id="kt_header_menu_mobile_toggle">
            </div>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            @include('layouts.navbar')
            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                @include('layouts.theme-mode')
                @include('layouts.user-dropdown')
            </div>
        </div>
    </div>
</div>
