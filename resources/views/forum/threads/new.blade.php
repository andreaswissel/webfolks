@extends('app')
@section('content')
  <div class="container forum">
    <section id="forum-topic" class="panel panel-default clearfix">
      <header class="panel-heading">
        <h1>Neues Thema</h1>
      </header>
      <section class="new topic">
        <form class="ajaxForm" referencing="/forum/category/{{ $category_id }}" request="thread/new" confirmable="false" redirect="self">
          <input type="text" placeholder="Thementitel hier angeben" name="title" class="form-control" />
          <br />
          <input type="text" placeholder="Beschreibung" name="description" class="form-control" />
          <fieldset>
            <textarea name="contents" class="form-control answerbox" id="answer"></textarea>
          </fieldset>
          <blockquote>Ctrl+Enter zum Absenden <br>
            Ctrl+R zum Antworten
          </blockquote>
          <button class="btn btn-primary pull-right answer-anchor">Antworten</button>
        </form>
      </section>
    </section>
  </div>
@stop