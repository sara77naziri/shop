<?php

namespace App\Models;

use App\Http\Requests\ProductPictureRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function brand(){
      return  $this->belongsTo(Brand::class);
    }
    public function category(){
        return  $this->belongsTo(Category::class);
    }


    public function pictures(){
        return  $this->hasMany(Picture::class);
    }


    public function addPicture(Request $request){

        $path = $request->file('image')->storeAs(
            'public/products/picture',
            $request->file('image') ->getClientOriginalName()
        );

        $this->pictures()->create([
            'path'=>$path,
            'mimes'=>$request->file('image')->getClientMimeType(),
        ]);
    }

    public function deletePicture(Picture $picture){
        Storage::delete($picture->path);
        $picture->delete();
    }

    public function discount(){
        return $this->hasOne(Discount::class);
    }

    public function addDiscount(Request $request){
        if(!$this->discount()->exists()){
            $this->discount()->create([
                'value'=>$request->get('value')
            ]);
        }
            else{
                $this->discount()->update([
                    'value'=>$request->get('value')
                ]);

            }

    }
    public function deleteDiscount(){
        $this->discount()->delete();
    }

    public function costWithDiscount(){
        if($this->discount()->exists()){
            return $this->cost - $this->cost * $this->discount->value /100;
        }
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)
            ->withPivot('value')
            ->withTimestamps();
    }

}
