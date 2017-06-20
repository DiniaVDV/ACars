<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = [
		'title',
		'category_name',
		'has_child',
		'parent_id',
		'parent_id_2',
		'description',
		
	];
	//Created array of categoties in right form (for show in browser).
	
    public static function  listOfCategories()
    {
		$categories = Category::all();
		foreach($categories as $element){
			if($element['has_child'] &&  $element['parent_id'] == null){
				$listCategories[$element['title']] = self::hasChild($element, $categories);
			}
		}
		return $listCategories;
    }
	
	//helping function for listOfCategories().

	private static function hasChild($element, $categories)
	{
		$listOfChild = array(0 => $element);
		$i = 0;
		foreach($categories as $childElement){
			$i++;
			if($element['id'] == $childElement['parent_id'] || $element['id'] == $childElement['parent_id_2']){
				if($childElement['has_child']){
					$listOfChild[$childElement['title']] = self::hasChild($childElement, $categories);
				}else{
				$listOfChild[$childElement['title']] = $childElement;
				}
			}
		}
		return $listOfChild;
	}
}
