<?php

namespace App\Http\Controllers;

use App\Product;

use App\Category;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function registerProduct(){
        return view('dashboard.register_product');
    }

    public function productList(){
        $product = new Product();
        $get_product = $product::all();
        return view('dashboard.product_list', compact('get_product'));
    }

    public function cash_on_delivery(){
        return view('dashboard.cash_on_delivery');
    }

    public function registerProductTrigger(Request $request){

        $product = new Product;

        if($files = $request->file('product_image')){
            $name = $files->getClientOriginalName();
            Image::make($files->move('image',$name))->fit(600,360);

            $data = array(
                'product_image' => $name,
                'product_name' => $request->item_name,
                'product_category' => 'Puke',
                'product_stock' => $request->stock,
                'product_price' => $request->price,
                'product_length' => $request->length,
                'product_width' => $request->width,
                'product_weight' => $request->weight,
                'product_description' => $request->editor
            );

            $insert = $product::insert($data);

            if($insert){
                return back()->with('success', 'Added Succesfully');
            }
        }
    }

    public function productDelete($id){
        $product = new Product;

        $delete = $product::where('product_id', $id)->delete();

        if($delete){
            return back()->with('success', 'Deleted Succesfully');
        }
    }

    public function category(){
        $category = new Category;

        $get_category = $category::all();

        return view('dashboard.category', compact('get_category'));
    }

    public function comment(){
        return view('dashboard.comment');
    }

    public function addStock($id){
        $product = new Product();

        $get_data = $product::where('product_id', '=', $id)->where('tag_deleted', '=', 0)->get();
        return view('dashboard.add_stock', [

            'id' => $id,
            'data' => $get_data
        ]);
    }

    public function addStocks(Request $request, $id){
        $product = new Product;

        $update_stock = $product::where('product_id', $id)->where('tag_deleted', '=', 0)->update([
            'product_stock' => $request->stock
        ]);

        if($update_stock){
            return back()->with('success', 'Stock Updated Succesfully');
        }
    }

    public function editProduct($id){
        $product = new Product;
        $get_product = $product::where('product_id', '=', $id)->where('tag_deleted', '=', 0)->get();

        return view('dashboard.edit_product',compact('get_product'));
    }

    public function editProductTrigger(Request $request){
        $product = new Product;

        if($files = $request->file('product_image')){
            $name = $files->getClientOriginalName();
            Image::make($files->move('image',$name))->fit(600,360);

            $update_product = $product::where('product_id', '=', $request->product_id)->where('tag_deleted', '=', 0)->update([
                'product_image' => $name,
                'product_name' => $request->item_name,
                'product_category' => $request->category,
                'product_stock' => $request->stock,
                'product_price' => $request->price,
                'product_length' => $request->length,
                'product_width' => $request->width,
                'product_weight' => $request->weight,
                'product_description' => $request->editor
            ]);

            if($update_product){
                return back()->with('success', 'Product Succesfully Updated');
            }
        }    

    }

    public function addCategory(Request $request){
        $category = new Category;
        $add_category = $category::insert(['category_name' => $request->category]); 

        if($add_category){
            return back()->with('success', 'Category Added Succesfully');
        }

    }

}
