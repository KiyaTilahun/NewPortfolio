<?php

namespace App\Http\Controllers\Api;

use App\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Filter\V1\PostFilter;
use App\Http\Resources\PostResource;
use App\Models\Blog\Like;
use App\Models\Blog\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PostController extends Controller
{
    use ApiResponse;
    /**
     * Display  all of the posts.
     * 
     * 
     * @queryParam filters[title] string Filter by Title. Example: `filters[title]=example`
     * @queryParam filters[created_at] date Filter by Creation Date. Example: `filters[created_at]=2024-08-30`
     * @queryParam filters[category] string Filter by Title. Example: `filters[categoey]=example`
     * @queryParam filters[filtertimeby] date Filter by time gap. Values='M'||'Y'||'W'
     * @queryParam sort string Field to sort by. Defaults to 'title'. Use `+` for ascending and `-` for descending order. Example: `title=-` or `created_at=+`
     */
    public function index(PostFilter $filter)
    {
        //
        // comment


        return PostResource::collection(Post::filter($filter)->where('is_published', true)->orderBy('created_at', 'desc')->paginate(10));
    }


    /**
     * 
     * Display the specific blog 
     * 
     * @urlParam id integer required The ID of the post.
     * }
     */
    public function show(Post $post)
    {


        if (!isset($post)) {

            return $this->error("Nothing Found");
        }
        $post->increment('view_count');
        return new PostResource($post);
    }
    public function demoshower()
    {


        return view('demoblog');
    }

    /**
     * Display Latest News .
     * 
     * <aside class="notice"> Use Parameter name="Number"</aside>
     */

    public function latest($day)
    {

        if (!is_numeric($day)) {

            return $this->error('Use a Numeric Value for the Number', 400);
        }
        // dd($day);
        $twoDaysAgo = Carbon::now()->subDays($day);
        // dd($twoDaysAgo);

        $latestPosts = Post::where(function ($query) use ($twoDaysAgo) {
            $query->where('created_at', '>=', $twoDaysAgo)
                ->orWhere('is_featured', true);
        })->orderBy('created_at', 'desc')->get();

        return PostResource::collection($latestPosts);
    }


    // post liking 



    /**
     * Liking and Unliking posts .
     * 
     */
    public function likePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $ipAddress = $request->ip();
    
        $existingLike = Like::where('post_id', $id)
                             ->where('ip_address', $ipAddress)
                             ->first();
    
        if ($existingLike) {
            $existingLike->delete();
    
            return response()->json([
                'message' => 'Post unliked successfully!',
                'like_count' => $post->likeCount()
            ]);
        } else {
            Like::create([
                'post_id' => $id,
                'ip_address' => $ipAddress
            ]);
    
            return response()->json([
                'message' => 'Post liked successfully!',
                'like_count' => $post->likeCount()
            ]);
        }
    }   
}
