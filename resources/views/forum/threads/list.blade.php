@extends('app')
@section('content')
  <div class="container forum">
    <section id="forum-topic" class="panel panel-default clearfix">
      <header class="panel-heading">
        <button class="pull-right btn btn-default answer-anchor">Antwort</button>
        <h1>
          {{ $thread->title }}
        </h1>
      </header>
      <div class="forum-post">
        @foreach($posts as $post)
        <div class="post-meta">
          <div>
            Geschrieben von <a href="/user/{{ $post->created_by }}/profile">user</a> am {{ $post->created_at }}
          </div>
        </div>
        <p>
          {{ $post->contents }}
        </p>
        @endforeach
      </div>
      <section class="answer topic">
        <header>
          <h1>
            Antworten
          </h1>
        </header>
        <form class="ajaxForm" refTo="forum" ref="self" req="saveAnswer" confirmable="false">
          <fieldset>
            <textarea name="contents" class="form-control answerbox" id="answer"></textarea>
            <input type="hidden" name="topic" value="{{ $thread->id }}" />
            <input type="hidden" name="cat" value="{{ $thread->category_id }}" />
          </fieldset>
          <blockquote>Shift+Enter zum Absenden <br>
            Shift+R zum Antworten
          </blockquote>
          <button class="btn btn-primary pull-right">Antworten</button>
        </form>
      </section>
    </section>
    <button class="btn btn-primary pull-right answer-anchor">Antworten</button>
  </div>
@stop