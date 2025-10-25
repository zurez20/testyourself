<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Player;
use App\Models\Agerange;
use App\Models\Question;
use App\Models\Answer;

class AdminController extends Controller
{
    public function indexDashboard()
    {
        return view('admin.dashboard');
    }

    public function indexUser()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user', compact('users'));
    }

    public function addUser(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->profileImage = $this->uploadFile($request, 'profileImage', 'media/adminImages/users');
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();

        Session()->flash('alert-success', "User Added Successfully");
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->userId);
        $user->delete();

        Session()->flash('alert-danger', "User Deleted Successfully");
        return redirect()->back();
    }


    public function indexCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->icon = $this->uploadFile($request, 'icon', 'media/adminImages/categories');
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->status = $request->status;
        $category->save();

        Session()->flash('alert-success', "Category Added Successfully");
        return redirect()->back();
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->categoryId);
        $category->icon = $this->updateUploadFile($request, 'icon', 'media/adminImages/categories', $category->icon);
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->status = $request->status;
        $category->update();

        Session()->flash('alert-success', "Category Updated Successfully");
        return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->categoryId);
        $category->delete();

        Session()->flash('alert-danger', "Category Deleted Successfully");
        return redirect()->back();
    }
    public function indexPlayer()
    {
        $players = Player::orderBy('created_at', 'desc')->get();
        return view('admin.player', compact('players'));
    }

    public function updatePlayer(Request $request)
    {
        $players = Player::find($request->playerId);
        $players->name = $request->name;
        $players->status = $request->status;
        $players->update();

        Session()->flash('alert-success', "Player Updated Successfully");
        return redirect()->back();
    }

    public function deletePlayer(Request $request)
    {
        $players = Player::find($request->playerId);
        $players->delete();

        Session()->flash('alert-danger', "Player Deleted Successfully");
        return redirect()->back();
    }
    public function indexAgerange()
    {
        $ageranges = Agerange::orderBy('created_at', 'desc')->get();
        return view('admin.agerange', compact('ageranges'));
    }

    public function addAgerange(Request $request)
    {
        $agerange = new Agerange();
        $agerange->icon = $this->uploadFile($request, 'icon', 'media/adminImages/ageranges');
        $agerange->name = $request->name;
        $agerange->desc = $request->description;
        $agerange->status = $request->status;
        $agerange->save();

        Session()->flash('alert-success', "AgeRange Added Successfully");
        return redirect()->back();
    }
    public function deleteAgerange(Request $request)
    {
        $agerange = Agerange::find($request->agerangeId);
        $agerange->delete();

        Session()->flash('alert-danger', "AgeRange Deleted Successfully");
        return redirect()->back();
    }
    public function indexQuestion()
    {
        $questions = Question::with('category','agerange','answers')->orderBy('created_at', 'desc')->get();
        // return $questions;
        return view('admin.question', compact('questions'));
    }

    public function addQuestion(Request $request)
    {
        $agerange = new Agerange();
        $agerange->icon = $this->uploadFile($request, 'icon', 'media/adminImages/ageranges');
        $agerange->name = $request->name;
        $agerange->desc = $request->description;
        $agerange->status = $request->status;
        $agerange->save();

        Session()->flash('alert-success', "AgeRange Added Successfully");
        return redirect()->back();
    }
    public function deleteQuestion(Request $request)
    {
        $agerange = Agerange::find($request->agerangeId);
        $agerange->delete();

        Session()->flash('alert-danger', "AgeRange Deleted Successfully");
        return redirect()->back();
    }
}
