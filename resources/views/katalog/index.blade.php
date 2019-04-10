@extends('app')
@section('content')
  <div class="block-header">
      <h2>LIST KATEGORI PRODUK</h2>
  </div>
  <div class="modal fade" id="createKategori" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">TAMBAH KATEGORI</h4>
                        </div>
                        <form class="" action="{{route('kategori.save')}}" method="post">
                        <div class="modal-body">
                          @include('katalog.create')
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
                      KATEGORI PRODUK
                  </h2>
                  <ul class="header-dropdown m-r--5">
                      <li>
                          <a href="javascript:void(0);" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#createKategori">
                              Tambah Kategori
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="body table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>KATEGORI</th>
                              <th>
                                <i class="material-icons">settings</i>
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($kategoris as $key => $value)
                          <tr>
                              <th scope="row">{{$key+1}}</th>
                              <td>{{$value->name}}</td>
                              <td>
                                <a href="{{route('kategori.edit',['id'=>$value->uuid])}}" class="btn btn-warning btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                <a href="{{route('kategori.delete',['id'=>$value->uuid])}}" class="btn btn-danger btn-xs waves-effect" onclick="return confirm('Serius ingin dihapus?')"><i class="material-icons">delete</i></a>
                              </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="3">Empty (0)</td>
                          </tr>
                        @endforelse
                      </tbody>
                  </table>
                  {{$kategoris->links()}}
              </div>
          </div>
      </div>
  </div>

@endsection
