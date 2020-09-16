<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\EditNameRequest;
use App\Http\Requests\EditImageRequest;
use App\Http\Requests\EditPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function user() {

        if (Auth::user()) {
            return Auth::user()->load('players', 'competitions');
        } else {
            return null;
        }
    }

    public function editName(EditNameRequest $request) {

        $user = Auth::user();

        $user->name = $request->name;

        $user->save();

        return Auth::user();
    }

    public function editImage(EditImageRequest $request) {

        $user = Auth::user();

        $oldImage = $user->image_url;

        if ($oldImage !== 'default.png') {

            Storage::disk('public')->delete('user/image/' . $oldImage);

        }

        $extension = $request->image->extension();

        $newImage = User::getRandomImageName() . '.' . $extension;

        Storage::disk('public')->putFileAs('user/image', $request->image, $newImage);

        $user->image_url = $newImage;

        $user->save();

        return Auth::user();
    }

    public function editPassword(EditPasswordRequest $request) {

        $user = Auth::user();

        $user->password = Hash::make($request->new_password);

        $user->save();

        return Auth::user();
    }

    public function delete() {

        $user = Auth::user();

        Auth::logout();

        $user->delete();

        return null;
    }

}