<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Storage;
use Illuminate\Support\Facades\Validator;
use View;

class SiteController extends Controller
{
    function __construct(){
        $kategoriListesi=Kategori::get();
        View::share(['kategoriListesi'=>$kategoriListesi]);
    }

    public function index(){
        return view('/admin/panel');
    }
    public function menulerMethod()
    {
        $menuListesi = Menu::get();
        $kategoriler = Kategori::all();
        return view('/admin/menu-duzenle', compact("menuListesi"));
    }

    public function menuDuzenle($id = false)
    {
        $menu = null;
        if ($id) {
            $menu = Menu::where('id', $id)->firstOrFail();
        }
        return view('/admin/menu-duzenle', compact("menu"));
    }

    public function menuKaydet(Request $request, $id = false)
    {

        $validator = Validator::make($request->all(), [
            'menu_foto' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
       $menu='';
        if ($id) {
            $menu = Menu::where('id', $id)->firstOrFail();
        } else {
            $menu = new Menu;
            
        }

        if ($request->hasFile('menu_foto')) {
            $imageName = time() . '.' . $request->menu_foto->extension();
            $request->menu_foto->move(public_path('uploads'), $imageName);
            $dosyaYolu= '/uploads/' . $imageName;
        }

        $menu->fill($request->all());
        $menu->kategori_id = $request->input('kategori_id');
        $menu->menu_foto=$dosyaYolu;
/*
        $menu = new Menu();
        $menu->menu_adi = $request->input('menu_adi');
        $menu->menu_fiyat = $request->input('menu_fiyat');
        $menu->menu_icerik = $request->input('menu_icerik');
        $menu->menu_foto = $request->input('menu_foto');
     */   
        $menu->save();
        return redirect()->to('/admin/menuler/liste');

    }
   
    public function menuSil($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu bulunamadı!');
        }

        $menu->delete();

        return redirect()->route('menuListesi')->with('success', 'Menu başarıyla silindi!');
    }

    public function menulerMetodu()
    {
        $menuListesi = Menu::all();
        return view('/admin/menu-duzenle', compact("menuListesi"));
    }

    public function menuListesi($id = false)
    {
        $menuListesi = "";
        if ($id) {
            $menuListesi = Menu::where('id', $id)->firstOrFail();
        }
        $menuListesi = Menu::get();
        return view('/admin/menu-listesi', compact("menuListesi"));
    
    }

            /******************************** KATEGORİLER ****************************/
      
           public function kategoriMethod()
            {
                $kategoriListesi = Kategori::get();
                return view('/admin/kategori-duzenle', compact("kategoriListesi"));
            }
            
    public function kategoriDuzenle($id = false)
    {
        $kategori = "";
        if ($id) {
            $kategori = Kategori::where('id', $id)->firstOrFail();
        }
        return view('/admin/kategori-duzenle', compact("kategori"));
    }

    public function kategoriKaydet(Request $request, $id = null)
{
    if ($id) {
        $kategori = Kategori::findOrFail($id);
    } else {
        $kategori = new Kategori;
    }

    $kategori->kategori_adi = $request->kategori_adi;
    $kategori->save();

    return redirect()->to('/admin/kategoriler/liste');

}

    public function kategoriSil($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return redirect()->back()->with('error', 'kategori bulunamadı!');
        }

        $kategori->delete();

        return redirect()->route('kategoriListesi')->with('success', 'kategori başarıyla silindi!');
    }

    public function kategorilerMetodu()
    {
       $kategoriListesi = Kategori::all();
          return view('/admin/kategori-duzenle', compact('kategoriListesi'));
    }

    public function kategoriListesi($id = false)
    {
        $kategoriListesi = "";
        if ($id) {
            $kategoriListesi = Kategori::where('id', $id)->firstOrFail();
        }
        $kategoriListesi = Kategori::get();
        return view('/admin/kategori-listesi', compact("kategoriListesi"));
    
    }

}
