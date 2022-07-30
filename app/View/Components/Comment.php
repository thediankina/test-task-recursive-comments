<?php

namespace App\View\Components;

use \App\Models\Comment as CommentModel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Comment extends Component
{
    /**
     * @var Model
     */
    public Model $comment;

    /**
     * @return void
     */
    public function __construct(int $id)
    {
        $this->comment = CommentModel::query()->with('replies')->find($id);

        $attributes = $this->comment->attributesToArray();
        $create_time = $attributes['created_at'];
        $update_time = $attributes['updated_at'];

        $this->comment->setAttribute('modification_time', ($create_time < $update_time) ?
            'updated ' . $this->reformat($update_time) :
            'created ' . $this->reformat($create_time));
    }

    /**
     * Преобразование даты и времени к читаемому виду
     *
     * @param string $timestamp
     * @return string
     */
    private function reformat(string $timestamp): string
    {
        $time = (date('d/m/Y', strtotime($timestamp)) == date('d/m/Y')) ?
            'today': date('d F Y', strtotime($timestamp));

        return $time . ' at ' . date('H:i', strtotime($timestamp));
    }

    /**
     * @return Application|Factory|View
     */
    public function render(): View|Factory|Application
    {
        return view('components.comment');
    }
}
