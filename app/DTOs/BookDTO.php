<?php

namespace App\DTOs;

class BookDTO extends BasicDTO
{
    public $id;
    public $title;
    public $author_id;
    public $is_vip_only;
    public $return_policy;

    public static function create($title, $author_id, $is_vip_only, $return_policy)
    {
        $dto = new self();
        $dto->title = $title;
        $dto->author_id = $author_id;
        $dto->is_vip_only = $is_vip_only;
        $dto->return_policy = $return_policy;

        return $dto;
    }

    public static function update($id, $title = null, $author_id = null, $is_vip_only = null, $return_policy = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($title)) {
            $dto->title = $title;
        }
        if (!is_null($author_id)) {
            $dto->author_id = $author_id;
        }
        if (!is_null($is_vip_only)) {
            $dto->is_vip_only = $is_vip_only;
        }
        if (!is_null($return_policy)) {
            $dto->return_policy = $return_policy;
        }

        return $dto;
    }

    public static function delete($id)
    {
        $dto = new self();
        $dto->id = $id;

        return $dto;
    }
}
