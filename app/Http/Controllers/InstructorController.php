<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateInstructorFormRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public function index(Request $request)

    {
        $search = $request->search;


         $instructors = Instructor::where(function($query) use ($search){
            if($search){
                $query -> where ('email', $search);
                $query -> orWhere ('name', 'LIKE', "%{$search}");

             }
         })->get();

        return view ('instructors.index', compact('instructors'));
    }

    public function show($id)

    {
        //$user = User::where('id', $id) -> first ();
        if (!$instructor = Instructor::find($id))
            return redirect()-> route('instructor.index');

        return view ('instructors.show', compact('instructor'));
    }

    public function create()
    {
        return view('instructors.create');
    }

    public function store(StoreUpdateInstructorFormRequest $request)
    {
        $data = $request->all();
        $data ['password']=bcrypt($request->password);

        Instructor::create($data);
        
        return redirect() -> route('instructors.index');
    }

    public function edit($id)
    {
        if (!$instructor = Instructor::find($id))
            return redirect()-> route('instructors.index');

        return view('instructors.edit', compact('instructor'));
    }

    public function update(StoreUpdateInstructorFormRequest $request, $id)
    {
        if (!$instructor = Instructor::find($id))
            return redirect()-> route('instructors.index');

        $data = $request->only('name', 'email');
        if ($request->password)
            $data['password']= bcrypt($request->password);

        $instructor->update($data);
        
        return redirect()-> route('instructors.index');
    }

    public function delete($id)

    {

        if (!$instructor = Instructor::find($id))
            return redirect()-> route('instructors.index');

        $instructor ->delete();

        return redirect()-> route('instructors.index');
    } 
}
