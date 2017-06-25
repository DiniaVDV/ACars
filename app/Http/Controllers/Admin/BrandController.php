<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;



class BrandController extends Controller
{
    /**
     * Show all Brand
     *
     * @return Response
     */

    public function index()
    {
        $brands = Brand::paginate(10);

        return view('admin.brands.show', compact('brands'));
    }

    /**
     * Show the page to create a new Brand
     *
     * @return Response
     */

    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Save a new Brand
     *
     * @param ArticleRequest $request
     * @return Response
     */

    public function store(/*BrandRequest*/ $request)
    {
        $this->createBrand($request);
        return redirect('admin/brands')->with([
            'flash_message' => 'Бренд был создан!',
            'flash_message_important' => true
        ]);
    }

    /** Edit a Brand
     *
     *@param Article $brand
     * @return Response
     */

    public function edit($id)
    {
		$brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update($id, BrandRequest $request)
    {
		
        $data = $request->all();
		
        if($request->file('logo')){
            $request->file('logo')->move(public_path('img/brands'), $request->file('logo')->getClientOriginalName());
            $data['logo'] = $request->file('logo')->getClientOriginalName();
        }
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return redirect('admin/brands')->with([
            'flash_message' => 'Бренд обновлен!',
            'flash_message_important' => true
        ]);

    }

    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        return redirect()->route('admin.brands')->with([
            'flash_message' => 'Бренд удален!',
            'flash_message_important' => true
        ]);
    }

    /**
     *
     * Save a new article.
     * @param ArticleRequest $request
     * @return Article
     */
    private function createBrand(/*ArticleRequest*/ $request)
    {
        $brand = new Brand($request->all());

        return $brand;
    }
	
}
