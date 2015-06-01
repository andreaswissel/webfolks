<?php namespace webfolks;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model {

  protected $fillable = [
    'title',
    'contents',
    'created_by',
    'category_id',
    'thread_id'
  ];

}
