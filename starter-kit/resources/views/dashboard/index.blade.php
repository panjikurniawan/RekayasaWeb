@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
  {{-- vendor css files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css')) }}">
@endsection

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">List Data Calon Mahasiswa Baru</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('dashboardcreate') }}"><button class="btn btn-primary shadow-md mr-2">
                Tambah Data</button></a>
            <div class="hidden md:block mx-auto text-slate-500">Showing list data entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            </div>
        </div>
<!-- Basic table -->
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <table class="datatables-basic table">
          <thead>
            <tr>
            <th style="font-size:8px" class="whitespace-nowrap">ID</th>
            <th style="font-size:8px" class="whitespace-nowrap">Nama Pendaftar</th>
            <th style="font-size:8px" class="whitespace-nowrap">Tempat Lahir</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Tanggal Lahir</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Alamat</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Jalur Masuk</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Prodi</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Sekolah Asal</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">No HP</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">Email</th>
            <th style="font-size:8px" class="text-center whitespace-nowrap">ACTIONS</th>
            </tr>
          </thead>
          <tbody>
                @foreach($data as $value)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div style="font-size:8px" class="w-10 h-10 image-fit zoom-in">
                                    {{ $value['id'] }} 
                                    </div>
                                </div>
                            </td>
                            <td>
                               
                                <div style="font-size:8px" class="text-slate-500">{{ $value['Nama_Pendaftar'] }}</div>
                            </td>
                            <td>
                               
                               <div style="font-size:8px" class="text-slate-500">{{ $value['Tempat_Lahir'] }}</div>
                           </td>
                           <td style="font-size:8px" class="text-center">{{ $value['Tanggal_Lahir'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['Alamat'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['Jalur_Masuk'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['Prodi'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['Sekolah_Asal'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['No_hp'] }}</td>
                            <td style="font-size:8px" class="text-center">{{ $value['Email'] }}</td>
                            
                            <td style="font-size:8px" class="table-report__action w-56">
                            <form action="{{ route('dashboardestroy' , $value['id']) }}" method='POST'>
                                    @csrf
                                    @method("delete")
                                    <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{ route('dashboardedit',$value['id']) }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <button class="flex items-center text-danger" type="submit"
                                    data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </button>
                                   
                                </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection

@section('vendor-script')
  {{-- vendor files --}}
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/jszip.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.rowGroup.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/tables/table-datatables-basic.js')) }}"></script>
@endsection