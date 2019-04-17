@extends('app')
@section('css')
  <!-- Multi Select Css -->
  <link href="{{asset('plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

  <!-- Bootstrap Spinner Css -->
  <link href="{{asset('plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">

  <!-- Bootstrap Tagsinput Css -->
  <link href="{{asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

  <!-- Bootstrap Select Css -->
  <link href="{{asset('plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

  <!-- noUISlider Css -->
  <link href="{{asset('plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TAMBAH PRODUK</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" novalidate="novalidate" action="{{route('produk.update')}}" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <input type="hidden" name="uuid" value="{{$produk->uuid}}">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required="" aria-required="true" value="{{$produk->name}}">
                                        <label class="form-label">Nama Produk</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Harga" name="harga" value="{{$produk->harga}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Kategori</label>
                                  <select class="form-control show-tick" data-live-search="true" name="kategori">
                                    @foreach ($kategori as $data)
                                      <option value="{{$data->id}}" @if ($data->id == $produk->catalog_id) selected @endif>{{$data->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label class="form-label">Gambar</label>
                                  <img src="{{asset('img/produk/'.$produk->image)}}" alt="" width="100px">
                                  <div class="form-line">
                                    <input type="file" class="form-control" name="image" required="" aria-required="true" accept="image/*">
                                  </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize" required="" aria-required="true">{{$produk->description}}</textarea>
                                        <label class="form-label">Deskripsi</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('js')
  <!-- Bootstrap Colorpicker Js -->
  <script src="{{('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

  <!-- Input Mask Plugin Js -->
  <script src="{{('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

  <!-- Multi Select Plugin Js -->
  <script src="{{('plugins/multi-select/js/jquery.multi-select.js')}}"></script>

  <!-- Jquery Spinner Plugin Js -->
  <script src="{{('plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>

  <!-- Bootstrap Tags Input Plugin Js -->
  <script src="{{('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

  <!-- noUISlider Plugin Js -->
  <script src="{{('plugins/nouislider/nouislider.js')}}"></script>

  <script src="{{('js/pages/forms/advanced-form-elements.js')}}"></script>
