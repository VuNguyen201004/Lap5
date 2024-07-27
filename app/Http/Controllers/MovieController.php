<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Gene;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Hiển thị danh sách phim với tìm kiếm.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $movies = Movie::with('genre')
            ->where('title', 'like', "%$search%")
            ->get();
        $genres = Gene::all(); // Đảm bảo có dữ liệu thể loại để sử dụng trong form thêm và sửa
        return view('movies.index', compact('movies', 'search', 'genres'));
    }

    /**
     * Hiển thị form để tạo mới phim.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $genres = Gene::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Lưu thông tin phim mới vào cơ sở dữ liệu.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'nullable|url',
            'intro' => 'required|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genes,id',
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    /**
     * Hiển thị thông tin chi tiết của một phim.
     *
     * @param Movie $movie
     * @return \Illuminate\View\View
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Hiển thị form để chỉnh sửa một phim.
     *
     * @param Movie $movie
     * @return \Illuminate\View\View
     */
    public function edit(Movie $movie)
    {
        $genres = Gene::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Cập nhật thông tin phim trong cơ sở dữ liệu.
     *
     * @param Request $request
     * @param Movie $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'nullable|url',
            'intro' => 'required|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genes,id',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    /**
     * Xóa một phim khỏi cơ sở dữ liệu.
     *
     * @param Movie $movie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}


