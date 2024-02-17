<?php
namespace User;

use db\Queries;
use img\ImageUploder;

class Services
{
    private static $context;
    private static $img_upload;
    public function __construct()
    {
        self::$context = new Queries();
        self::$img_upload = new ImageUploder();
    }

        
    public function show_all()
    {
        // select all categories in database
        $show = self::$context->select(table: "users");
        return $show;
    }


    public function show($id)
    {
        // select data from database is fetch data (array type)
        $show = self::$context->select(table: "categories", where: ["category_id"=>$id], fetch: true);
        return $show;
    }


    public function add($title, $image_name)
    {
        // file_upload 
        $image_file = self::$img_upload->file_upload("categories", $image_name);

        // data from
        self::$context->insert("categories", ["title", "image_url"], ['{$title}', '{$image_file}']);
    }


    public function edit($id, $title, $image_name)
    {
        // file updoader 
        $image_file = self::$img_upload->file_upload("categories", $image_name);

        // update database
        self::$context->update('categories', ['title'=> $title, 'image_url'=> $image_file], 'category_id='.$id);
    }


    public function delete($id)
    {
        // delete data in database by category_id
        self::$context->delete('categories', 'category_id', $id);
    }
}