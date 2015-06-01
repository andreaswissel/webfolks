@extends('app')
@section('content')
  <div class="container forum">
    <section id="forum-topic" class="panel panel-default clearfix">
      <header class="panel-heading">
        <h1>Neues Thema</h1>
      </header>
      <section class="new topic">
        <form class="ajaxForm" refTo="forum" ref="newTopic" req="saveTopic" confirmable="false">
          <input type="text" placeholder="Thementitel hier angeben" name="topicTitle" class="form-control" />
          <br />
          <input type="text" placeholder="Beschreibung" name="topicDescription" class="form-control" />
          <fieldset>
            <textarea name="contents" class="form-control answerbox" id="answer"></textarea>
            <input type="hidden" name="cat" value="{{ $category_id }}" />
          </fieldset>
          <blockquote>Ctrl+Enter zum Absenden <br>
            Ctrl+R zum Antworten
          </blockquote>
        </form>
      </section>
    </section>
    <button class="btn btn-primary pull-right answer-anchor">Antworten</button>
  </div>
@stop