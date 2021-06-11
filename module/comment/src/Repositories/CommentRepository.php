<?php


namespace Comment\Repositories;


use Comment\Models\Comment;
use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository
{
    public function model()
    {
        return Comment::class;
    }


}
