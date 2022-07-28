<?php

namespace App\View\Components;

use \App\Models\Comment as CommentModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * @var array
     */
    public array $comment;

    /**
     * @return void
     */
    public function __construct(int $id)
    {
        $this->comment = CommentModel::query()->findOrFail($id)->toArray();
    }

    /**
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.comment');
    }
}
