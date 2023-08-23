@extends('/admin/panel')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Kategori Düzenle</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="POST" action="{{ route('kategoriKayit',['id' => @$kategori->id]) }}">
            @csrf
            <div class="col-12">
                <label class="form-label">Kategori Adı</label>
                <input type="text" class="form-control" name="kategori_adi" value="{{ @$kategori->kategori_adi }}">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Kaydet</button>
                
            </div>
            
        </form><!-- Vertical Form -->

    </div> 
</div>
@endsection
