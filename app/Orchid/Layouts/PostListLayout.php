<?php

namespace App\Orchid\Layouts;

use App\Models\Post;
use App\Models\User;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;

class PostListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    public $target = 'posts';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    return Link::make($post->title)
                        ->route('platform.post.edit', $post);
                }),

            TD::make('description', 'Description')
                ->width('400px')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Post $post) {
                    return substr($post->description, 0, 100) . (strlen($post->description) > 100 ? '...' : '');
                }),

            TD::make('author', 'Author')
                ->render(function (Post $post) {
                    $user = User::find($post->author);
                    return $user ? $user->name : 'Usuario desconocido';
                }),

            TD::make('created_at', 'Created'),
            TD::make('updated_at', 'Last edit'),
        ];
    }

}
