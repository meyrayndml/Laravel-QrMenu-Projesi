@extends('/admin/panel')
@section('content')

<div class="card">
            <div class="card-body">
            <h5 class="card-title">Menü Listesi <a href="{{ route('menuDuzenle') }}">Menü Ekle</a></h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menü Adı</th>
                    <th scope="col">Menü Fiyatı</th>
                    <th scope="col">Menü İçeriği</th>
                    <th scope="col">Menü Fotoğrafı</th>
                    <th scope="col">Kategori</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                @foreach($menuListesi as $menu)
                  <tr>
                    <th scope="row">{{ $menu->id }}</th>
                    <td>{{ $menu->menu_adi }}</td>
                    <td>{{ $menu->menu_fiyat }}</td>
                    <td>{{ $menu->menu_icerik }}</td>
                    <td><img src="{{$menu->menu_foto}}" width="100px"></td>
                    <td>{{ $menu->kategori->kategori_adi }}</td>
                    <td> <a href="{{ route('menuDuzenle',['id'=>$menu->id]) }}">Düzenle</a> <a href="{{ route('menuSil',['id' => @$menu->id]) }}">Sil</a></td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
@endsection
