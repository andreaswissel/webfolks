<?php namespace webfolks\Http\Controllers;

use webfolks\Http\Requests;
use webfolks\Http\Controllers\Controller;
use webfolks\Categories;
use webfolks\Threads;

use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category_id)
	{
    $category = Categories::find($category_id);
    $threads = Threads::where('category_id', $category_id)
      ->orderBy('threads.created_at', 'desc')
      ->join('users', 'users.id', '=', 'threads.created_by')
      ->get();
    return view('forum.categories.threads', compact('category', 'threads'));
	}

  public function getCategories() {
    $categories = Categories::all();

    return $categories;
  }

  public function getCategoryId($id) {
    $category = Categories::where('id', $id)->first();

    return $category;
  }
}
