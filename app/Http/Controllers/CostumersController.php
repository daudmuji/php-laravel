<?php

namespace App\Http\Controllers;

use App\DataTables\CostumersDataTable;
use App\Http\Requests\CostumersRequest;
use App\Models\City;
use App\Models\Costumers;
use App\Models\Pekerjaan;
use App\Models\Province;
use App\Models\SubDistrict;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CostumersController extends Controller
{
    private static $title = 'Nasabah';

    static function breadcrumb()
    {
        return [
            self::$title, route('nasabah.index')
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CostumersDataTable $dataTable)
    {
        $this->authorize('costumers_access');
        $title = 'Data ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
        ];

        return $dataTable->render('nasabah.index', compact('title', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('costumers_create');
        $title = 'Tambah ' . self::$title;

        $breadcrumbs = [
            HomeController::breadcrumb(),
            self::breadcrumb(),
            [$title, route('nasabah.create')],
        ];


        $stmtPekerjaan = Pekerjaan::orderBy('id')->get();

        $stmtProvince = Province::orderBy('id')->get();

        $stmtCity = [];
        if (old('kode_kabupaten_kota')) {
            $stmtCity = City::where('kode', 'kode_kabupaten_kota')->get();
        }

        $stmtSubdistrict = [];
        if (old('kode_kecamatan')) {
            $stmtSubdistrict = SubDistrict::where('kode', 'kode_kecamatan')->get();
        }

        $stmtWard = [];
        if (old('kode_kelurahan')) {
            $stmtWard = Ward::where('kode', 'kode_kelurahan')->get();
        }

        return view('nasabah.create', compact('title', 'breadcrumbs', 'stmtPekerjaan', 'stmtProvince', 'stmtCity', 'stmtSubdistrict', 'stmtWard'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostumersRequest $request)
    {
        $this->authorize('costumers_create');


        $stmtPekerjaan = Pekerjaan::where('kode', $request->kode_pekerjaan)->first();

        $stmtProvince = Province::where('kode', $request->kode_provinsi)->first();
        $stmtCity = City::where('kode', $request->kode_kabupaten_kota)->first();
        $stmtSubdistrict = SubDistrict::where('kode', $request->kode_kecamatan)->first();
        $stmtWard = Ward::where('kode', $request->kode_kelurahan)->first();
        $costumers = Costumers::create($request->validated() + [
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kode_pekerjaan' => $stmtPekerjaan !== null ? $stmtPekerjaan->kode : null,
                'kode_provinsi' => $stmtProvince !== null ? $stmtProvince->kode : null,
                'kode_kabupaten_kota' => $stmtCity !== null ? $stmtCity->kode : null,
                'kode_kecamatan' => $stmtSubdistrict !== null ? $stmtSubdistrict->kode : null,
                'kode_kelurahan' => $stmtWard !== null ? $stmtWard->kode : null,
                'alamat' => $request->alamat,
                'nominal_setor' => $request->nominal_setor,
            ]);

        return Redirect::route('nasabah.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Data Nasabah berhasil dibuat");
    }

    public function getCityByProvinci(Request $request)
    {
        $kode_provinsi = $request->input('kode_provinsi');
        return City::where(['kode_provinsi' => $kode_provinsi])
            ->orderBy('id')
            ->get();
    }

    public function getSubDistrictByCity(Request $request)
    {
        $kode_kabupaten_kota = $request->input('kode_kabupaten_kota');
        return SubDistrict::where(['kode_kabupaten_kota' => $kode_kabupaten_kota])
            ->orderBy('id')
            ->get();
    }

    public function getWardBySubDistrict(Request $request)
    {
        $kode_kecamatan = $request->input('kode_kecamatan');
        return Ward::where(['kode_kecamatan' => $kode_kecamatan])
            ->orderBy('id')
            ->get();
    }

    public function approve($id)
    {
        $this->authorize('costumers_edit');
        $id = dekrip($id);
        $costumers = Costumers::find($id);

        $costumers->update(['is_approved' => true]);

        return redirect()->route('nasabah.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Nasabah {$costumers->nama} berhasil diapprove");
    }

    public function notapprove($id)
    {
        $this->authorize('costumers_edit');
        $id = dekrip($id);
        $costumers = Costumers::find($id);

        $costumers->update(['is_approved' => false]);

        return redirect()->route('nasabah.index')
            ->with('alert.status', '00')
            ->with('alert.message', "Nasabah {$costumers->nama} berhasil dinonaktifkan");
    }
}
