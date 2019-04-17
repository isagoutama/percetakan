@extends('app')
@section('content')
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRODUK
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                  <a href="{{route('produk.create')}}" class="btn btn-primary waves-effect">
                                      Tambah Produk
                                  </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">

                          @foreach ($produks->chunk(3) as $produk)
                          <div class="row">

                            @foreach ($produk as $key)
                              <div class="col-sm-6 col-md-4">
                                  <div class="thumbnail">
                                      <img src="{{asset('img/produk/'.$key->image)}}">
                                      <div class="caption">
                                          <h3>{{$key->name}}</h3>
                                          <p>
                                            <small>Rp. {{$key->harga}}</small>
                                          </p>
                                          <p>
                                            {{$key->description}}
                                          </p>
                                          <p>
                                            @if (Auth::user() && Auth::user()->role=='admin')
                                                <a href="{{route('produk.edit',['id'=>$key->uuid])}}" class="btn btn-warning btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                                <a href="{{route('produk.delete',['id'=>$key->uuid])}}" class="btn btn-danger btn-xs waves-effect" onclick="return confirm('Serius ingin dihapus?')"><i class="material-icons">delete</i></a>
                                                @else
                                                  <a href="#" class="btn btn-warning btn-xs waves-effect"><i class="material-icons">add_shopping_cart</i></a>
                                              @endif
                                          </p>
                                      </div>
                                  </div>
                              </div>
                            @endforeach
                          </div>
                        @endforeach
                          {!! $produks->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endsection
