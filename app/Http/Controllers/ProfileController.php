<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Post;
use App\Models\Forum;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display all user profiles
     */
    public function index()
    {
        $userModel = new User;
        $users = $userModel->paginate(30);

        return view('website.community', ['users' => $users]);
    }

    /**
     * display specific user's profile
     */
    public function show($userId)
    {
        $userModel = new User;
        $user = $userModel->where("id", $userId)->get();

        // comments under user
        $comments = $this->getProfileComments(1, 4);

        return view('website.user-profile', ['user' => $user, 'comments' =>$comments]);
    }

    public function getProfileComments($forumId, int $paginate_num)
    {

        $posts = Post::where('parent_forum_id', $forumId)->paginate($paginate_num);

        return $posts;
    }

    public function createComment(Request $request)
    {
        $validatedData = $request->validate([
            "post_author" => "string",
            "post_content" => "required",
            "post_author_email" => "string",
            "parent_forum_id" => "required|integer",
        ]);

        $user = Auth::user();

        $posts = new Post();

        $posts->post_content = $validatedData['post_content'];
        $posts->parent_forum_id = $validatedData['parent_forum_id'];

        $posts->post_author = $user->name;
        $posts->post_author_email = $user->email;
       

        $posts->save();

        return response()->json([
            'message' => 'Forum created successfully!',
            'event'   => $posts
        ], 201);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
