<?php

namespace App\Models;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Title', 'Author', 'Category' ,'Description', 'Price',
    ];
    public $timestamps = false;

    /*
    $table->id('b_Id');
            $table->char('Title', 100);
            $table->char('Author', 100);
            $table->char('Category', 100);
            $table->char('Description', 1000);
            $table->float('Price', 8, 2);



    */
}
