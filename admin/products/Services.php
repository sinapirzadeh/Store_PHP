<?php
namespace Product;

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


    public function show_all($table = 'products')
    {
        // select all categories in database
        $show = self::$context->select(table: $table);
        return $show;
    }


    public function show($id)
    {
        // select data from database is fetch data (array type)
        $show = self::$context->select(table: "products", where: ["product_id"=>$id], fetch: true);
        return $show;
    }


    public function add($name, $price, $image_name, $category_id)
    {
        // file_upload 
        $image_file = self::$img_upload->file_upload("products", $image_name);

        // data from
        self::$context->insert("products", ["name", "price", "image_url", "category_id"], ['{$name}', '{$price}', '{$image_file}', '{$category_id}']);
    }


    public function edit($id, $name, $price, $image_name, $category_id)
    {
        // file updoader 
        $image_file = self::$img_upload->file_upload("products", $image_name);

        // update database
        self::$context->update('products', ['title'=>$name, 'price'=>$price, 'image_url'=>$image_file, 'category_id'=>$category_id], 'product_id=' . $id);
    }


    public function delete($id)
    {
        // delete data in database by category_id
        self::$context->delete('products', 'product_id', $id);
    }
}