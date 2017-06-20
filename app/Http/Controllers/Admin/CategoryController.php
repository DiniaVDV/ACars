<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);
		$categoriesParent = Category::pluck('title' , 'id');
        return view('admin.categories.show', compact('categories', 'categoriesParent'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
		$categories = Category::pluck( 'title', 'id');
		unset($categories[$category->id]);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    public function update($id, CategoryRequest $request)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('admin.categories')->with([
            'flash_message' => 'Категория обновлена!',
            'flash_message_important' => true
        ]);
    }

    public function create()
    {
		$categories = Category::pluck( 'title', 'id');
        return view('admin.categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories')->with([
            'flash_message' => 'Категория была довавлена!',
            'flash_message_important' => true
        ]);
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('admin.categories')->with([
            'flash_message' => 'Категория удалена!',
            'flash_message_important' => true
        ]);
    }
	
	public function changeParentCategory(Request $request)
	{
					
		$categoryNumAndId = explode('_', $request->get('categoryId'));
		$categoryId = $categoryNumAndId[1];
		$category = Category::findOrFail($categoryId);
		$parentId = !empty($request->get('parentId')) ? $request->get('parentId') : null;
		if($categoryNumAndId[0] == 1){
			if($request->get('flag') == 'true'){
				$category->parent_id = $parentId;
			}else{
				$category->parent_id = null;
			}
		}elseif($categoryNumAndId[0] == 2){
			if($request->get('flag') == 'false'){
				$category->parent_id_2 = $parentId;
			}else{
				$category->parent_id_2 = null;
			}
		}
		$category->update();	
	}
	
	public function changeHasChild(Request $request)
	{
		$category = Category::findOrFail($request->get('categoryId'));
		$flag = $request->get('flag');
		if($flag == 'true'){
			$category->has_child = 1;
		}elseif($flag == 'false'){
			$category->has_child = 0;
		}
		$category->update();	
	}

}