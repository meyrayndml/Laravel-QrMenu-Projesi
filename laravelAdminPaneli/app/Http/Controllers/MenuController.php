<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menuFilter()
    {    
        $kategoriListesi = Kategori::all();
        $menuListesi = Menu::all();
        
        return view('/qr-menu/menu', compact('kategoriListesi', 'menuListesi')); 
    }
    


public function indexFilter()
{    
    $kategoriListesi = Kategori::all();
    $menuListesi = Menu::all();

    return view('/qr-menu/index',  compact('kategoriListesi', 'menuListesi'));
}
}
