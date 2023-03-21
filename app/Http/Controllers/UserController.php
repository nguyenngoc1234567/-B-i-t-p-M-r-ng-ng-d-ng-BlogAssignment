<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Dotenv\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::get();
        $users = User::paginate(5);

        return view('user.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
    //     $validated = $request->validate([
    //         'name' => 'required|unique:users|max:200',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'phone' => 'required'
    //     ],
    //         [
    //             'name.required'=>'Không được để trống',
    //             'name.unique'=>'Không được trùng lặp dữ liệu',
    //             'name.max'=>'Trường bắt buộc bé hơn :max',
    //             'email.required'=>'Không được để trống',
    //             'password.required'=>'Không được để trống',
    //             'phone.required'=>'Không được để trống'
    //         ]
    // );

        $user = new User();
        $user->name = $request->name;
        $user->email  = $request->email ;
        $user->password  = $request->password ;
        $user->phone  = $request->phone ;


    $user->save();

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email  = $request->email ;
        $user->password  = $request->password ;
        $user->phone  = $request->phone ;
        $user->save();

        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('users');
    }
    public function search(Request $request)
{
    $search = $request->input('search');
    if (!$search) {
        return redirect()->route('users.index');
    }
    $users = User::where('name', 'LIKE', '%' . $search . '%')->paginate();

    return view('user.index', compact('users'));
}
}
