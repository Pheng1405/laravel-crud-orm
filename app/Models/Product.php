<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    const TABLE = "product";
    const ID    = "id";
    const NAME  = "name";
    const CATEGORY_ID = "category_id";
    const PRICE = "price";
    const DESCRIPTION = "description";


    use HasFactory;

    protected  $table      = self::TABLE;
    protected  $primaryKey = self::ID;
    protected  $fillable   = [
                                self::NAME,
                                self::CATEGORY_ID,
                                self::PRICE,
                                self::DESCRIPTION
                            ];

    public function setProduct($request){
        $this->{self::NAME}        =  $request[self::NAME];
        $this->{self::PRICE}       =  $request[self::PRICE];
        $this->{self::CATEGORY_ID} =  $request[self::CATEGORY_ID];
        $this->{self::DESCRIPTION} =  $request[self::DESCRIPTION];
    }

    public static function getProduct(){
        return DB::table('product')
                                ->join('category', 'category.id', 'product.category_id')
                                ->select(
                                    'product.*',
                                    'category.name as category'
                                )
                                ->get()
                                ;


        //('SELECT product.*, category.name AS category FROM product LEFT JOIN category ON product.category_id = category.id');
        // return "Hello";
    }
}
