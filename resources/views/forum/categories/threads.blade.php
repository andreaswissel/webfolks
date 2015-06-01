@extends('app')
@section('jumbotron_title')
  <p>
    {{ $category->title }}
  </p>
@stop
@section('content')
  <div class="container forum">
    <section id="forum-categories"  class="panel panel-default clearfix">
      <header class="panel-heading">
        <h1>
          <button class="btn btn-primary pull-right" href="/forum/category/{{ $category->id }}/thread/new">
            Neues Thema
          </button>
          Themen
        </h1>
      </header>
      <table style="width: 100%;" class="table table-hover table-responsive">
        <thead>
        <tr>
          <th width="60%">
            Titel
          </th>
          <th width="5%">
            Antworten
          </th>
          <th width="15%">
            Erstellt von
          </th>
          <th width="20%">
            Erstellt am
          </th>
        </tr>
        </thead>
        @forelse($threads as $thread)
          <tr>
            <td>
              <a href="/forum/thread/{{ $thread->id }}" class="forum-link">
                {{ $thread->title }}
              </a>
            </td>
            <td>

            </td>
            <td>
              {{ $thread->created_by }}
            </td>
            <td>
              {{ $thread->created_at }}
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4">
              No threads to display.
            </td>
          </tr>
        @endforelse
      </table>
    </section>
    <button class="btn btn-primary pull-right" href="/forum/category/{{ $category->id }}/new">
      Neues Thema
    </button>
  </div>
@stop