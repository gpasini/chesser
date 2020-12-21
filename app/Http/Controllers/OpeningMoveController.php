<?php

namespace App\Http\Controllers;

use App\Models\Move;
use Illuminate\Http\Request;

class OpeningMoveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $openingId, $moveId = null)
    {
        $moveQuery = Move::where('opening_id', $openingId);

        if(is_null($moveId)) {
            $moveQuery->whereNull('parent_move_id');
        } else {
            $moveQuery->where('id', $moveId);
        }

        $move = $moveQuery->first();

        return [
            'move' => $move,
            'previousMove' => !is_null($move->parent_move_id) ? Move::find($move->parent_move_id) : null,
            'nextMoves' => Move::where('parent_move_id', $move->id)->get(),
        ];
    }
}
