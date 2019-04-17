@extends('app')
@section('content')
  @include('app.carousel')
  <div class="modal fade" id="createKategori" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">TAMBAH GAMBAR</h4>
                        </div>
                        <form class="" action="{{route('carousel.save')}}" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                          @include('carousel.create')
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
  <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
              <div class="header">
                  <h2>
                      SLIDE SHOW
                  </h2>
                  <ul class="header-dropdown m-r--5">
                      <li>
                          <a href="javascript:void(0);" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#createKategori">
                              Tambah Gambar
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="body table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nama File</th>
                              <th>Gambar</th>
                              <th>
                                <i class="material-icons">settings</i>
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($slides as $key => $value)
                          <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$value->image}}</td>
                              <td>
                                <img src="{{asset('img/carousel/'.$value->image)}}" alt="" width="75px">
                              </td>
                              <td>
                                <a href="{{route('carousel.delete',['id'=>$value->id])}}" class="btn btn-danger btn-xs waves-effect" onclick="return confirm('Serius ingin dihapus?')"><i class="material-icons">delete</i></a>
                              </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4">Empty (0)</td>
                          </tr>
                        @endforelse
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

@endsection
