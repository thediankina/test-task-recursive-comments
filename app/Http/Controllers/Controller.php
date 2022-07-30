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
use Illuminate\Support\Facades\View as ViewComponent;

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
        $comments = Comment::query()
            ->orderBy('id', 'desc')
            ->whereNull('id_parent')
            ->get();

        return view('index', ['comments' => $comments]);
    }

    /**
     * Добавить новый комментарий
     *
     * @param Request $request
     * @param string $message
     * @return View
     */
    public function create(Request $request, string $message = 'Comment added successfully.'): View
    {
        $id = $request->input('parent');
        $content = $request->input('content');

        if (is_null($content)) {
            $message = 'Comment can not be empty. Try again.';
        } else {
            Comment::query()->create([
                'id_parent' => $id,
                'content' => $content,
            ]);
        }

        return ViewComponent::make('components.message', [
            'message' => $message,
        ]);
    }

    /**
     * Вывести форму для ответа на комментарий
     *
     * @param Request $request
     * @return View
     */
    public function reply(Request $request): View
    {
        $id = $request->input('id');
        return ViewComponent::make('components.form', ['id' => $id]);
    }
}
