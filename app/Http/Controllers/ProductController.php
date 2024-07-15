<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    protected $products = [
        [
            'id' => 1,
            'name' => 'Kaos Kampung Warna-warni',
            'category' => 'pakaian',
            'color' => 'Hitam',
            'price' => 100000,
            'description' => 'Kaos ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Kaos ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'kaos.jpeg',
            'sizes' => ['S', 'M', 'L', 'XL', 'XXL']
        ],
        [
            'id' => 2,
            'name' => 'Topi Kampung Warna-warni (Merah)',
            'category' => 'topi',
            'color' => 'Merah',
            'price' => 50000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Topi ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'topi.jpeg',
            'sizes' => []
        ],
        [
            'id' => 3,
            'name' => 'Topi Kampung Warna-warni (Krem)',
            'category' => 'topi',
            'color' => 'Krem',
            'price' => 50000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Topi ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'topi2.jpeg',
            'sizes' => []
        ],
        [
            'id' => 4,
            'name' => 'Topi Kampung Warna-warni (Pink)',
            'category' => 'topi',
            'color' => 'Pink',
            'price' => 50000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Topi ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'topi3.jpeg',
            'sizes' => []
        ],
        [
            'id' => 5,
            'name' => 'Totebag Kampung Warna-warni',
            'category' => 'tas',
            'color' => 'Pink',
            'price' => 50000,
            'description' => 'Totebag ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Totebag ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'totebag.jpeg',
            'sizes' => []
        ],
        [
            'id' => 6,
            'name' => 'Pouch Kampung Warna-warni ',
            'category' => 'tas',
            'color' => 'Pink',
            'price' => 50000,
            'description' => 'Pouch ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Poucb ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'pouch.jpeg',
            'sizes' => []
        ],
        [
            'id' => 7,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Gantungan Kunci ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'gantungan.jpeg',
            'sizes' => []
        ],
        [
            'id' => 8,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'gantungan2.jpeg',
            'sizes' => []
        ],
        [
            'id' => 9,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'gantungan3.jpeg',
            'sizes' => []
        ],
        [
            'id' => 10,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'gantungan4.jpeg',
            'sizes' => []
        ],
        [
            'id' => 11,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'gantungan3.jpeg',
            'sizes' => []
        ],
        [
            'id' => 12,
            'name' => 'Gantungan Kunci Kampung Warna-warni',
            'category' => 'gantungan',
            'color' => 'Pink',
            'price' => 15000,
            'description' => 'Topi ini merupakan hasil karya UMKM Kampung Warna-warni Malang. Gantungan Kunci ini memiliki beberapa macam ukuran yang dapat kalian beli untuk dijadikan buah tangan dan ikut membantu perekonomian warga Kampung Warna-warni Malang.',
            'image' => 'sandal.jpeg',
            'sizes' => []
        ]
    ];

    public function index()
    {
        $products = $this->products;
        return view('dashboard', compact('products'));
    }

    public function show($id)
    {
        $product = collect($this->products)->firstWhere('id', $id);

        return view('detail-product', compact('product'));
    }
    public function viewAdd()
    {
        return view('sample/add-product');
    }
    public function store(Request $req)
    {
        $imageName = time() . '.' . $req->photo->extension();
        $req->photo->move(public_path('images'), $imageName);

        $product = Product::create([
            'name' => $req->name,
            'price' => $req->price,
            'color' => $req->color,
            'description' => $req->description,
            'photo' => $imageName
        ]);

        if ($req->sizes[0]['stock'] != null) {
            foreach ($req->sizes as $s) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $s['size'],
                    'stock' => $s['stock'],
                ]);
            }
        }

        return redirect('/admin/edit')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function productDetail($id)
    {
        $data['product'] = Product::find($id);
        $data['product_detail'] = ProductSize::where('product_id', $id)->get();
        return view('detail-product', $data);
    }
    public function viewEdit($id)
    {
        $data['product'] = Product::find($id);
        $data['product_detail'] = ProductSize::where('product_id', $id)->get();
        return view('admin/edit', $data);
    }
    public function update(Request $req)
    {
        if ($req->photo) {
            $imageName = time() . '.' . $req->photo->extension();
            $req->photo->move(public_path('images'), $imageName);

            $product = Product::findOrFail($req->id);
            $product->update([
                'name' => $req->name,
                'price' => $req->price,
                'color' => $req->color,
                'description' => $req->description,
                'photo' => $imageName
            ]);

            if ($req->sizes) {
                ProductSize::where('product_id', $req->id)->delete();
                foreach ($req->sizes as $s) {
                    ProductSize::create([
                        'product_id' => $product->id,
                        'size' => $s['size'],
                        'stock' => $s['stock'],
                    ]);
                }
            }
        } else {
            $product = Product::findOrFail($req->id);
            $product->update([
                'name' => $req->name,
                'price' => $req->price,
                'color' => $req->color,
                'description' => $req->description
            ]);
            if ($req->sizes) {
                ProductSize::where('product_id', $req->id)->delete();
                foreach ($req->sizes as $s) {
                    ProductSize::create([
                        'product_id' => $product->id,
                        'size' => $s['size'],
                        'stock' => $s['stock'],
                    ]);
                }
            }
        }

        return redirect('/admin/edit')->with('success', 'Edit produk berhasil!');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/admin/edit')->with('success', 'Produk berhasil dihapus!');
    }
}
