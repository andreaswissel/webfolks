<?php namespace webfolks;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

	protected $fillable = [
    'title',
    'description',
    'created_by'
  ];

}
