@extends('app')
@section('content')
  <form class="" action="{{route('kategori.update')}}" method="post">
    <input type="hidden" name="uuid" value="{{$kategori->uuid}}">
  {{ csrf_field() }}
              <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                      <div class="body">
                          <div class="row clearfix">
                              <div class="col-sm-12">
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" class="form-control" name="nama" value="{{$kategori->name}}" required/>
                                          <label class="form-label">Nama Kategori</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <textarea class="form-control" name="deskripsi" rows="6">{{$kategori->description}}</textarea>
                                          <label class="form-label">Deskripsi</label>
                                      </div>
                                  </div>
                                  <div class="form-group form-float">

                                          <button type="submit" class="btn btn-info waves-effect pull-right">SIMPAN</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
              </div>
            </form>

@endsection
