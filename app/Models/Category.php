<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const TABLE = "category";
    const ID    = "id";
    const NAME  = "name";



    
    use HasFactory;

    protected  $table      = self::TABLE;
    protected  $primaryKey = self::ID;
    protected  $fillable   = [
                                self::NAME,
                            ];

    public function setProduct($request){
        $this->{self::NAME}        =  $request[self::NAME];
    }
}
