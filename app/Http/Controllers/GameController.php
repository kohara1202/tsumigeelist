<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Maker;
use App\Models\Hard;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $makers = Maker::orderBy('makerfurigana', 'asc')->get();
        $hards = Hard::orderBy('hardname', 'asc')->get();

        $gamecnt = Game::count();
        $playcnt = Game::where('clear', 'クリア')->count();
        $notplaycnt = Game::where('clear', '積み')->count();
        $dontplaycnt = Game::where('clear', '-')->count();

        $makerid = $request->input('narrow_maker', 0);
        $hardids = $request->input('narrow_hard', []);
        $clears = $request->input('narrow_clear', []);
        $grades = $request->input('narrow_grade', []);

        $query = Game::query()->with(['maker', 'hard']);
        if ($makerid != 0) {
            $query = $query->where('maker_id', $makerid);
        }
        if (count($hardids) != 0) {
            $query = $query->wherein('hard_id', $hardids);
        }
        if (count($clears) != 0) {
            $query = $query->wherein('clear', $clears);
        }
        if (count($grades) != 0) {
            $query = $query->wherein('grade', $grades);
        }
        $games = $query->orderBy('furigana', 'asc')->get();

        return view('game.index')->with([
            'games' => $games,
            'makers' => $makers,
            'hards' => $hards,
            'gamecnt' => $gamecnt,
            'playcnt' => $playcnt,
            'notplaycnt' => $notplaycnt,
            'dontplaycnt' => $dontplaycnt,
            'old_maker' => $makerid,
            'old_hards' => $hardids,
            'old_clears' => $clears,
            'old_grades' => $grades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}