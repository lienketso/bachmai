<?php

namespace Document\Repositories;

use Document\Models\Document;
use Prettus\Repository\Eloquent\BaseRepository;

class DocumentRepository extends BaseRepository
{
    public function model()
    {
        return Document::class;
    }
}
