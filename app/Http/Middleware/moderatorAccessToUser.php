<?php

namespace App\Http\Middleware;

use App\Models\Field\Field;
use App\Models\Field\Note\Note;
use App\Models\Field\Note\NoteShow;
use App\Models\Field\Rotation;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class moderatorAccessToUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user_id = $request->segment(3);

        switch ($request->segment(2)) {
            case 'fields':
                $user_id = Field::findOrFail($user_id)->user_id;
                break;
            case 'notes':
                $user_id = Note::findOrFail($user_id)->user_id;
                break;
            case 'rotations':
                $user_id = Rotation::findOrFail($user_id)->user_id;
                break;
        }

        $noteShow = NoteShow::where('asked_for_user_id', $user_id)
            ->where('asking_user_id', Auth::id())
            ->where('access', 1)
            ->exists();

        if (Auth::check() && (Auth::user()->role == 1 || $noteShow)) {
            return $next($request);
        }

        abort(403, 'У вас нет прав!');
    }

}
