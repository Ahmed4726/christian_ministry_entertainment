<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{
    public function addGroup() {
        return view('layouts.admin.groups.addgroups',['groups'=>Group::all()]);
    }
    public function createGroup(Request $request)     {

        if($request->hasFile('group_image')){
        $filename = $request->file('group_image')->getClientOriginalName();
        }
        $request->file('group_image')->storeAs('/public/images',$filename);
                $group= new Group();
                $group->group_title=$request->input("group_title");
                $group->description=$request->input("description");
                // $group->SKU=$request->input("SKU");
                $group->group_image = $filename;
                $group->save();
                // $category=Category::where('title', $request->input("category"))->get()->first();
                // $category->products()->save($product);
                return redirect()->route('admin.group.addGroup')->with('success','Group created successfully');

    }
}
