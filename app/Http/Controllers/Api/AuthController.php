<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validasi 

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Registrasi user berhasil'
        ], 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => false,
                'message' => 'username atau password salah'
            ], 400);
        }
        $token = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'status' => true,
            'message' => 'berhasil login',
            'user' => Auth::user()->id,
            'token' => $token
        ], 200);
    }

    public function articleList(Request $request)
    {
        $data = Articles::where('user_id', Auth::user()->id)->paginate($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil lihat list artikel',
            'data' => $data
        ], 200);
    }

    public function createArticle(Request $request)
    {
        $data = Articles::create([
            "category_id" => rand(1, 4),
            "title" => $request->title,
            "content" => fake()->paragraphs(5, true),
            "image" => $request->image,
            "user_id" => Auth::user()->id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambah artikel',
            'data' => $data
        ], 201);
    }
    public function showDetail(Request $request)
    {
        $categoryId = $request->id;
        $data = Articles::where('user_id', Auth::user()->id)
            ->where('id', $categoryId)
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil lihat detail artikel',
            'data' => $data
        ], 200);
    }
    public function updateArticle(Request $request)
    {
        $article = Articles::find($request->id);

        // $article->category_id = $request->category_id;
        // $article->title = $request->title;
        // $article->content=$request->content;
        // $article->image=$request->image;

        // $article->save(); 
        $article->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Berhasil update data',
            'data' => $article
        ], 200);
    }
    public function deleteArticle(Request $request)
    {
        $article = Articles::find($request->id);
        $article->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil hapus data',
            'data' => $article
        ], 200);
    }
}
