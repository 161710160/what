@extends('layouts.global')

@section('title') Daftar Checkouts @endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		@if(session('status'))
			<div class="alert alert-success">
		{{session('status')}}
	</div>
		@endif
<div class="row">

  <div class="col-lg-12">
    @if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
    @endif
  </div>
</div>
<div class="row mb-3">
			<div class="col-md-12 text-right">

		<table class="table table-bordered table-stripped">
			<thead>
              <tr>
                <th><b>Nama Depan</b></th>
                <th><b>Nama Belakang</b></th>
                <th><b>Telephone</b></th>
                <th><b>Alamat Satu</b></th>
                <th><b>Alamat Dua</b></th>
                <th><b>Negara</b></th>
                <th><b>Kota</b></th>
                <th><b>Daerah</b></th>
                <th><b>Kode Pos</b></th>
                <th><b>Action</b></th>
              </tr>
            </thead>
            <tbody>
              @foreach($checkouts as $data)
              <tr>
                  <td>{{$data->nama_depan}}</td>
                  <td>{{$data->nama_belakang}}</td>
                  <td>{{$data->telephone}}</td>
                  <td>{{$data->alamat_satu}}</td>
                  <td>{{$data->alamat_dua}}</td>
                  <td>{{$data->negara}}</td>
                  <td>{{$data->kota}}</td>
                  <td>{{$data->daerah}}</td>
                  <td>{{$data->kode_pos}}</td>
                  <td>
                 <div class="btn-group dropdown">

              <a class="btn btn-warning" href="{{ route('checkout.edit',$data->id) }}">Edit</a>&nbsp&nbsp&nbsp&nbsp
              <form method="post" action="{{ route('checkout.destroy',$data->id) }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="DELETE">

                <button onclick="return konfirmasi()"type="submit" class="btn btn-danger">Delete</button>
                <script>
                  function konfirmasi(){
                    tanya = confirm("Yakin ingin menghapus data?");
                    if(tanya == true) return true;
                    else return false;
                  }
                </script>
              </form>
            </div>
        </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{--  {!! $checkouts->links() !!} --}}
    </div>
  </div>
</div>
</div>
@endsection