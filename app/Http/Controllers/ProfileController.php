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
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

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
        $user = $userModel->where("id", $userId)->firstOrFail();

        // comments under user
        $comments = $this->getProfileComments($userId, 4);

        return view('website.user-profile', ['user' => $user, 'comments' =>$comments]);
    }

    public function showDashboard()
    {
        $user = Auth::user();
        $comments = $this->getProfileComments($user->id, 4);

        return view('dashboard', [
            'user' => $user,
            'comments' => $comments
        ]);
    }

    public function getProfileComments($userId, int $paginate_num)
    {

        return Post::where('parent_forum_id', $userId)
                    ->where('post_type', 'profile')
                    ->paginate($paginate_num);
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
        $posts->parent_forum_id = $request->parent_forum_id;
        $posts->post_type = 'profile';

        $posts->post_author = $user->name;
        $posts->post_author_email = $user->email;

        $posts->post_likes = 0;
        $posts->post_dislikes = 0;
       

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
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        $user = $request->user();

        if($request->hasFile('profile_picture'))
        {
            if($user->profile_photo_path)
            {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $path = $request ->file('profile_picture')->store('profile_pics', 'public');
            $user->profile_photo_path = $path;
        }

        $user->bio = $request->bioContent;
        $user->user_year = $request->userYear;
        $user->user_major = $request->userMajor;
        $user->age = $request->userAge;

        $user->fill($request->safe()->only(['name', 'email']));

        if($user->isDirty('email'))
        {
            $user->email_verified_at = null;
        }

        $user->save();

        return response()->json([
        'message' => 'Profile Updated Successfully',
        'user' => $user
        ], 200);
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
