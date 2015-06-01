<?php namespace webfolks;

use Illuminate\Database\Eloquent\Model;

class Threads extends Model {

  protected $fillable = [
    'title',
    'description',
    'created_by',
    'category_id'
  ];

}
