@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-1 me-2">
                            {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com014.svg') !!}
                        </span>
                        <h2>{{ $title }}</h2>
                    </div>
                    @can('costumers_create')
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('nasabah.create') }}" type="button" class="btn btn-primary">
                                    <span class="svg-icon svg-icon-2">
                                        {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/arrows/arr075.svg') !!}
                                    </span>
                                    Tambah Nasabah
                                </a>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="card-body py-4">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ $dataTable->scripts() }}
@endsection

