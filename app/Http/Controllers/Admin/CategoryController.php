<?php
namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
		$roles = User::find(\Auth::user()->id)->roles()->get();
        $request->session()->put('roles', $roles);
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
        $category = new Category($request->all());
		$category->category_name = $this->conver_to_en(mb_strtolower($request->input('title')));
		$category->save();
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
	
	public function conver_to_en($string){
		$array = [
			'a' => 'a',		'б' => 'b',		'в' => 'v',		'г' => 'g',
			'д' => 'd',		'е' => 'e',		'ё' => 'e',		'ж' => 'zh',
			'з' => 'z',		'и' => 'i',		'й' => 'y',		'к' => 'k',
			'л' => 'l',		'м' => 'm',		'н' => 'n',		'о' => 'o',		
			'п' => 'p',		'р' => 'r',		'с' => 's',		'т' => 't',
			'у' => 'u',		'ф' => 'f',		'х' => 'h',		'ц' => 'c',	
			'ч' => 'ch',	'ш' => 'sh',	'щ' => 'sch',	'ь' => '',
			'ы' => 'y',		'ъ' => '',	    'э' => 'e',		'ю' => 'yu',
			'я' => 'ya',
			'А' => 'A',		'Б' => 'B',		'В' => 'V',		'Г' => 'G',
			'Д' => 'D',		'Е' => 'E',		'Ё' => 'E',		'Ж' => 'Zh',
			'З' => 'Z',		'И' => 'I',		'Й' => 'Y',		'К' => 'K',
			'Л' => 'L',		'М' => 'M',		'Н' => 'N',		'О' => 'O',		
			'П' => 'P',		'Р' => 'R',		'С' => 'S',		'Т' => 'T',
			'У' => 'U',		'Ф' => 'F',		'Ч' => 'H',		'Ц' => 'C',	
			'Ч' => 'Ch',	'Ш' => 'Sh',	'Щ' => 'Sch',	'Ь' => '',
			'Ы' => 'Y',		'Ъ' => '',	    'Э' => 'E',		'Ю' => 'Yu',
			'Я' => 'Ya',	' ' => '_',  	'/' => '_',		',' => '',
		];
		return strtr($string, $array);
	}

}