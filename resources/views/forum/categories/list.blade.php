@extends('app')
@section('content')
  <div class="container">
    <section id="forum-categories">
      <ul>
        @foreach($categories as $category)
        <li>
          <a href="/forum/category/{{ $category->id }}">
            {{ $category->title }}
            <small>
              {{ $category->description }}
            </small>
          </a>
        </li>
        @endforeach
      </ul>
    </section>
  </div>
@stop