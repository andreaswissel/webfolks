<?php namespace webfolks\Http\Controllers;

use webfolks\Http\Requests;
use webfolks\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ThreadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($thread_id)
	{
    $thread = \webfolks\Threads::all()->where('id', $thread_id)->first();
    $posts = \webfolks\Posts::all()->where('thread_id', $thread_id);
    return view('forum.threads.list', compact('thread', 'posts'));
	}

  public function newAnswer(Request $request, $thread_id) {
    $post = \webfolks\Posts::create(['contents' => nl2br($request->input('contents')), 'created_by' => $request->user()->id, 'category_id' => 1, 'thread_id' => $thread_id]);
    if($post) {
      print json_encode(['success' => true]);
    } else {
      print json_encode(['success' => false]);
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
