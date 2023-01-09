@extends('../layout/' . $layout)

@section('subhead')
    <title>Create Data With API</title>
@endsection
@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Tambah Data Mahasiswa Baru</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
        @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
            <!-- BEGIN: Form Layout -->
            <form action="{{ route('dashboardstore') }}" method='POST'>
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Nama Pendaftar</label>
                    <input id="Nama_Pendaftar" type="text" class="form-control w-full" name="Nama_Pendaftar" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Tempat Lahir</label>
                    <input id="Tempat_Lahir" type="text" class="form-control w-full" name="Tempat_Lahir" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Tanggal Lahir</label>
                    <input id="Tanggal_Lahir" type="text" class="form-control w-full" name="Tanggal_Lahir" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Alamat</label>
                    <input id="Alamat" type="text" class="form-control w-full" name="Alamat" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Jalur Masuk</label>
                    <input id="Jalur_Masuk" type="text" class="form-control w-full" name="Jalur_Masuk" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Prodi</label>
                    <input id="Prodi" type="text" class="form-control w-full" name="Prodi" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Sekolah Asal</label>
                    <input id="Sekolah_Asal" type="text" class="form-control w-full" name="Sekolah_Asal" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">No HP</label>
                    <input id="No_hp" type="text" class="form-control w-full" name="No_hp" >
                </div>
                <div class="mt-3">
                <div>
                    <label for="crud-form-1" class="form-label">Email</label>
                    <input id="Email" type="text" class="form-control w-full" name="Email" >
                </div>
                <div class="mt-3">
                <div class="text-right mt-5">
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection