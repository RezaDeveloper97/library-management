<?php

namespace App\Commands;

class BookCommand
{
    public $id;
    public $title;
    public $author_id;
    public $is_vip_only;
    public $return_policy;

    public static function create($title, $author_id, $is_vip_only, $return_policy)
    {
        $command = new self();
        $command->title = $title;
        $command->author_id = $author_id;
        $command->is_vip_only = $is_vip_only;
        $command->return_policy = $return_policy;

        return $command;
    }

    public static function update($id, $title = null, $author_id = null, $is_vip_only = null, $return_policy = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($title)) {
            $command->title = $title;
        }
        if (!is_null($author_id)) {
            $command->author_id = $author_id;
        }
        if (!is_null($is_vip_only)) {
            $command->is_vip_only = $is_vip_only;
        }
        if (!is_null($return_policy)) {
            $command->return_policy = $return_policy;
        }

        return $command;
    }

    public static function delete($id)
    {
        $command = new self();
        $command->id = $id;

        return $command;
    }
}
