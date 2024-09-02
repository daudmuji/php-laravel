@extends('main')

@section('content')
    @include('layouts.toolbar')

    <div id="kt_content_container" class="d-flex flex-column-auto align-items-start container-xxl">
        <div class="content flex-row-fluid" id="kt_content">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card card-flush h-lg-100">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <span class="svg-icon svg-icon-1 me-2">
                                    {!! file_get_contents('metronic/demo2/assets/media/icons/duotune/communication/com006.svg') !!}
                                </span>
                                <h2>{{ $title }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <form action="{{ route('nasabah.store') }}" class="form" method="POST"
                                  id="form">
                                @csrf
                                <div class="fv-row mb-7">
                                    <label for="nama" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nama</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Nama hanya bisa diisi dengan huruf atau spasi"></i>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-solid text-uppercase @error('nama') is-invalid @enderror"
                                           name="nama" value="{{ old('nama') }}" id="nama"/>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="tempat_lahir" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Tempat Lahir</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Tempat Lahir hanya bisa diisi dengan huruf atau spasi, harus berbeda dengan yang sudah ada"></i>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-solid text-uppercase @error('tempat_lahir') is-invalid @enderror"
                                           name="tempat_lahir" value="{{ old('tempat_lahir') }}" id="tempat_lahir"/>
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="Tanggal Lahir" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Tanggal Lahir</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Tanggal Lahir hanya bisa diisi dengan huruf atau spasi, harus berbeda dengan yang sudah ada"></i>
                                    </label>
                                    <input type="date"
                                           class="form-control form-control-solid text-uppercase @error('tanggal_lahir') is-invalid @enderror"
                                           name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir"/>
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="jenis_kelamin" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Jenis Kelamin</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Jenis Kelamin Hanya ada Pria dan Wanita"></i>
                                    </label>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input type="radio"
                                                   class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                   name="jenis_kelamin"
                                                   value="Pria"
                                                    {{ old('jenis_kelamin') == 'Pria' ? 'checked' : '' }}>
                                            <span class="form-check-label">Pria</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input type="radio"
                                                   class="form-check-input @error('jenis_kelamin') is-invalid @enderror"
                                                   name="jenis_kelamin"
                                                   value="Wanita"
                                                    {{ old('jenis_kelamin') == 'Wanita' ? 'checked' : '' }}>
                                            <span class="form-check-label">Wanita</span>
                                        </label>
                                    </div>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode_pekerjaan" class="fs-6 fw-semibold form-label mt-3">
                                        <span>Pekerjaan</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Pekerjaan yang ada saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                            class="form-select form-select-solid @error('kode_pekerjaan') is-invalid @enderror"
                                            id="kode_pekerjaan" name="kode_pekerjaan"
                                            data-control="select2" data-placeholder="---Pilih Pekerjaan---">
                                        <option value=""></option>
                                        @foreach ($stmtPekerjaan as $item)
                                            <option value="{{ $item->kode }}"
                                                    {{ $item->kode == old('kode_pekerjaan') ? 'selected' : '' }}>
                                                {{ $item->kode . ' - ' . $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode_provinsi" class="fs-6 fw-semibold form-label mt-3">
                                        <span>Provinsi</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Provinsi yang ada saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                            class="form-select form-select-solid @error('kode_provinsi') is-invalid @enderror"
                                            id="kode_provinsi" name="kode_provinsi"
                                            data-control="select2" data-placeholder="---Pilih Provinsi---">
                                        <option value=""></option>
                                        @foreach ($stmtProvince as $item)
                                            <option value="{{ $item->kode }}"
                                                    {{ $item->kode }}>
                                                {{ $item->kode . ' - ' . $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode_kabupaten_kota" class="fs-6 fw-semibold form-label mt-3">
                                        <span>Kabupaten/Kota</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kabupaten/Kota yang ada saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                            class="form-select form-select-solid @error('kode_kabupaten_kota') is-invalid @enderror"
                                            id="kode_kabupaten_kota" name="kode_kabupaten_kota"
                                            data-control="select2" data-placeholder="---Pilih Kabupaten/Kota---">
                                        <option value=""></option>
                                        @foreach ($stmtCity as $item)
                                            <option value="{{ $item->kode }}"
                                                    {{ $item->kode == old('kode_kabupaten_kota') ? 'selected' : '' }}>
                                                {{ $item->kode . ' - ' . $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_kabupaten_kota')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode_kecamatan" class="fs-6 fw-semibold form-label mt-3">
                                        <span>Kecamatan</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kecamatan yang ada saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                            class="form-select form-select-solid @error('kode_kecamatan') is-invalid @enderror"
                                            id="kode_kecamatan" name="kode_kecamatan"
                                            data-control="select2" data-placeholder="---Pilih Kecamatan---">
                                        <option value=""></option>
                                        @foreach ($stmtSubdistrict as $item)
                                            <option value="{{ $item->kode }}"
                                                    {{ $item->kode == old('kode_kecamatan') ? 'selected' : '' }}>
                                                {{ $item->kode . ' - ' . $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="kode_kelurahan" class="fs-6 fw-semibold form-label mt-3">
                                        <span>Kelurahan</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Hanya Kelurahan yang ada saja yang dapat dipilih"></i>
                                    </label>
                                    <select
                                            class="form-select form-select-solid @error('kode_kelurahan') is-invalid @enderror"
                                            id="kode_kelurahan" name="kode_kelurahan"
                                            data-control="select2" data-placeholder="---Pilih Kelurahan---">
                                        <option value=""></option>
                                        @foreach ($stmtWard as $item)
                                            <option value="{{ $item->kode }}"
                                                    {{ $item->kode == old('kode_kelurahan') ? 'selected' : '' }}>
                                                {{ $item->kode . ' - ' . $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_kelurahan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="alamat" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Alamat</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Alamat hanya bisa diisi dengan huruf atau spasi, harus berbeda dengan yang sudah ada"></i>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-solid text-uppercase @error('alamat') is-invalid @enderror"
                                           name="alamat" value="{{ old('alamat') }}" id="alamat"/>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="fv-row mb-7">
                                    <label for="nominal_setor" class="fs-6 fw-semibold form-label mt-3">
                                        <span class="required">Nominal Setor</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                           title="Nominal Setor"></i>
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-solid @error('nominal_setor') is-invalid @enderror"
                                           name="nominal_setor_display" id="nominal_setor_display"
                                           oninput="formatCurrency(this)"/>
                                    <input type="hidden" name="nominal_setor" id="nominal_setor"
                                           value="{{ old('nominal_setor') }}">
                                    @error('nominal_setor')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="separator mb-6"></div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light me-3">Reset</button>
                                    <button type="submit" class="btn btn-primary">
                                        <span class="indicator-label">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function formatCurrency(input) {
            // Remove any non-digit characters
            let value = input.value.replace(/[^0-9]/g, '');

            // Format number with commas for thousands
            let formattedValue = new Intl.NumberFormat('id-ID', {
                style: 'decimal',
                minimumFractionDigits: 0
            }).format(value);

            // Update the display input with the formatted currency
            input.value = formattedValue;

            // Update the hidden input with the numeric value
            document.getElementById('nominal_setor').value = value;
        }

        $(document).ready(function () {
            $('#kode_provinsi').on('change', function () {
                $.ajax({
                    url: "{{ route('stmtNasabah.get-city-by-kode-provinsi') }}?kode_provinsi=" +
                        $(this).val(),
                    type: 'GET',
                    contentType: 'application/json',
                    success: (data) => {
                        console.log(data);
                        var html =
                            `<option></option>`;
                        var html =
                            `<option></option>`;
                        for (item of data) {
                            console.log(item);
                            html +=
                                `<option value="${item.kode}">${item.kode} - ${item.nama}</option>`;
                        }

                        $('#kode_kabupaten_kota').html(html);
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#kode_kabupaten_kota').on('change', function () {
                $.ajax({
                    url: "{{ route('stmtNasabah.get-kecamatan-by-kode-kota') }}?kode_kabupaten_kota=" +
                        $(this).val(),
                    type: 'GET',
                    contentType: 'application/json',
                    success: (data) => {
                        console.log(data);
                        var html =
                            `<option></option>`;
                        var html =
                            `<option></option>`;
                        for (item of data) {
                            console.log(item);
                            html +=
                                `<option value="${item.kode}">${item.kode} - ${item.nama}</option>`;
                        }

                        $('#kode_kecamatan').html(html);
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#kode_kecamatan').on('change', function () {
                $.ajax({
                    url: "{{ route('stmtNasabah.get-kelurahan-by-kode-kecamatan') }}?kode_kecamatan=" +
                        $(this).val(),
                    type: 'GET',
                    contentType: 'application/json',
                    success: (data) => {
                        console.log(data);
                        var html =
                            `<option></option>`;
                        var html =
                            `<option></option>`;
                        for (item of data) {
                            console.log(item);
                            html +=
                                `<option value="${item.kode}">${item.kode} - ${item.nama}</option>`;
                        }

                        $('#kode_kelurahan').html(html);
                    }
                });
            });
        });

    </script>
@endsection
