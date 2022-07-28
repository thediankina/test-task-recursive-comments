<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * Контроллер управления комментариями
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Вывести все комментарии
     *
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $comments = Comment::all();

        return view('index', ['comments' => $comments]);
    }

    /**
     * Добавить новый комментарий
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request): void
    {
        $content = $request->input('comment');
        $model = Comment::query()->create([
            'content' => $content
        ]);
    }
}
