@extends('/admin/panel')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Menü Düzenle</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="POST" action="{{ route('menuKayit',['id' => @$menu->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label class="form-label">Menü Adı</label>
                <input type="text" class="form-control" name="menu_adi" value="{{ @$menu->menu_adi }}">
            </div>
            <div class="col-12">
                <label class="form-label">Menü Fiyatı</label>
                <input type="text" class="form-control" name="menu_fiyat" value="{{ @$menu->menu_fiyat }}">
            </div>
            <div class="col-12">
                <label class="form-label">Menü İçeriği</label>
                <input type="text" class="form-control" name="menu_icerik" value="{{ @$menu->menu_icerik }}">
            </div>
        
            <div class="col-12">            
                <label for="menu_foto" class="form-label">Fotoğraf</label>
                 <input type="file" class="form-control" id="menu_foto" name="menu_foto">
                  @if ($errors->has('menu_foto'))
                 <div class="alert alert-danger">{{ $errors->first('menu_foto') }}</div>
                @endif
                </div>
                
                <label for="kategori_id">Kategori</label>
                <select name="kategori_id" id="kategori_id" input type="text" class="form-control">
                    @foreach ($kategoriListesi as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->kategori_adi }}</option>
                    @endforeach
                </select>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>
@endsection
