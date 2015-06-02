<?php namespace webfolks\Http\Controllers;

use League\Flysystem\Exception;
use webfolks\Http\Requests;
use webfolks\Http\Controllers\Controller;

use webfolks\Threads;
use webfolks\Posts;
use Illuminate\Http\Request;

class ThreadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($category_id, $thread_id)
	{
    $thread = Threads::find($thread_id)->first();
    $posts = Posts::where('thread_id', $thread_id)
      ->join('users', 'users.id', '=', 'posts.created_by')
      ->get();

    return view('forum.threads.list', compact('thread', 'posts', 'category_id'));
	}

  public function newAnswer(Request $request, $thread_id) {
    try {
      $post = Posts::create(['contents' => nl2br($request->input('contents')), 'created_by' => $request->user()->id, 'category_id' => 1, 'thread_id' => $thread_id]);
      print json_encode(['success' => true, 'post_id' => $post->id]);
    } catch(Exception $e) {
      print json_encode(['success' => false, 'error' => $e]);
    }
  }

  public function displayNewThread(Request $request, $category_id) {
    return view('forum.threads.new', compact('category_id'));
  }

  public function createNewThread(Request $request, $category_id) {
    try {
      $thread = Threads::create(['title' => $request->input('title'), 'description' => $request->input('description'), 'contents' => $request->input('contents'), 'created_by' => $request->user()->id, 'category_id' => $category_id]);
      Posts::create(['contents' => $request->input('contents'), 'created_by' => $request->user()->id, 'category_id' => $category_id, 'thread_id' => $thread->id]);
      print json_encode(['success' => true, 'thread_id' => $thread->id]);
    } catch(Exception $e) {
      print json_encode(['success' => false, 'error' => $e]);
    }
  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$thread = DB::select('select * from thread where id = '.$id);

    return view('forum.thread', compact('thread'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
