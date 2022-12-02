<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function todo()
    {
        $data = Todo::where('user_id', Auth::user()->id)->get();
        return view('dashboard.index', compact('data'));
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function registerAccount(Request $request)
        {
            $request->validate([
                'email' => 'required|email:dns',
                'username' => 'required|min:4|max:8',
                'password' => 'required|min:4',
                'name' => 'required|min:3'
            ]);

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect('/')->with('success', 'Berhasil menambahkan akun. Silakan login~');
        }

    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ],[
            'username.exists' => 'username belum tersedia, silakan registrasi',
            'username.required' => 'username harus diisi ya, minimal 4, maksimal 8',
            'password.required' => 'password harus ada, dan minimal 4 yah dik',
        ]);

        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            return redirect()->route('todo.index');
        }else{
            return redirect()->back()->with('error', 'Gagal login, silakan cek kembali dan coba lagi');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);

        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('todo.index')->with('successAdd', 'Cie berhasil nambahin list Todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource--> menampilkan halaman edit
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::where('id', $id)->first();

        return view('dashboard.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'date' => 'required',
            'description' => 'required|min:5',
        ]);

        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id,
        ]);

        return redirect('/todo')->with('successupdate', 'Selamat km abis update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::where('id', '=', $id)->delete();
        return redirect()->back()->with('successDelete', "Kamu hapus todonya");
        // $todo = todo::findOrfail($id);
        // $todo->delete();
        // return redirect()->route('todo.index')->with('successDelete', "Kamu hapus todonya");
    }

    public function completed()
    {
        return view('dashboard.completed');
    }

    public function updateCompleted($id)
    {
        Todo::where('id', '=', $id)->update([
            'status'=>1,
            'done_time'=> \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('done', 'Todonya dah kelar. Yey');
    }
}
