<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    public function index()
    {
          // Fetch all comments
        $comments= Comment::all();

        return response()->json($comments);
    }


    // Create a new comment
    public function store(Request $request)
    {

         // Validate input
        $this->validate($request,[
            'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required',
        ]);

        // Create a new Comment instance
        $comment = new Comment();

         // Fill Comment attributes from request
        $comment->user_id = $request->input('post_id');
        $comment->post_id = $request->input('post_id');
        $comment->comment = $request->input('post_id');

        $comment->save();                     // Save the comment
        return response()->json($comment);    // Return the newly created comment
    }

   
    public function show($id)
    {
         // Find the comment by ID
        $comment= Comment::find($id);

        return response()->json($comment);
    }

   
 
   // Update a comment
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required',
        ]);

        $comment= Comment::find($id);

        
        $comment->user_id = $request->input('post_id');
        $comment->post_id = $request->input('post_id');
        $comment->comment = $request->input('post_id');

        $comment->save();
        return response()->json($comment);
    }

      // Delete a comment
    public function destroy($id)
    {
        $comment= Comment::find($id);
        $comment->delete();

        return response()->json('product deleted successfully');
    }
}
