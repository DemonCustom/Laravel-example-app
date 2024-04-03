<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Post>
 */
class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Посты';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Название','name')
                    ->required()
                    ->sortable(),
                TinyMce::make('Краткое описание','description')
                    ->hideOnIndex(),
                TinyMce::make('Текст','content')
                    ->required()
                    ->hideOnIndex(),
                Image::make('Картинка','poster')
                    ->required()
                    ->hideOnIndex(),
                BelongsToMany::make('Категории','categories',resource: new CategoryResource())

            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
