<?php

namespace App;

use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Image;

class Post extends Model
{
    protected $guarded = [];

    public function imageProcessing(Request $request)
    {
        if ($request->has('photo')) {
            $str_position = strpos($request->photo, ';');
            $sub_string = substr($request->photo, 0, $str_position);
            $extention = explode('/', $sub_string)[1];
            $name = time() . "." . $extention;

            $img = Image::make($request->photo)->resize(200, 200);
            $upload_path = public_path()."/upload_img/";

            $img->save($upload_path.$name);

            return $name;
        }
    }

    public function validatePost(Request $request)
    {
        return $request->validate(
            [
                'title' => ['required', 'min:3', 'max:255'],
                'description' => ['required', 'min:6'],
                'category_id' => ['required'],
                'photo' => 'required|max:1248576',
                //|image|mimes:jpeg,png,jpg,gif,svg
            ]
        );
    }

    public function addPost($attributes)
    {
        auth()->user()->posts()->create($attributes);
    }

    public function deletePost()
    {
        $this->delete();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
