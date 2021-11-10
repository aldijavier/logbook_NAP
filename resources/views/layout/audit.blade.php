@extends('master2')
@section('after_style')
@endsection
@section('content')
@section('title','Guest Book Nap Info')
@section('content') 
<section class="content card" style="padding: 10px 10px 10px 10px ">
    <div class="box">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col">
                <h3><i class="nav-ico my-1 btn-sm-1"></i> Audit Log</h3>
                <hr>
            </div>
        </div>
        {{-- <div>
            <div class="col">
                <a class="btn btn-primary btn-sm my-1 mr-sm-1" href="{{ route('pengguna.create') }}" role="button"><i
                        class="fas fa-plus"></i> Tambah Data</a>
                <br><br>
            </div>
        </div> --}}
        <div class="row table-responsive">
            <div class="col-12">
                <table class="table table-hover table-head-fixed" id='tabelSuratmasuk'>
                    <thead>
                        <tr class="bg-light">
                            <th>No.</th>
                            <th>Email</th>
                            <th>Ip Address</th>
                            <th>Access From</th>
                            <th>Activity</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;?>
                        @foreach($data_pengguna as $pengguna)
                        <?php $no++ ;?>
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$pengguna->username}}</td>
                            <td>{{$pengguna->ip_address}}</td>
                            <td>{{$pengguna->access_from}}</td>
                            <td>{{$pengguna->activity}}</td>
                            <td>{{$pengguna->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection

    
@endsection
    @push('page-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

   @endpush

   @push('after-scripts')
   
  @endpush