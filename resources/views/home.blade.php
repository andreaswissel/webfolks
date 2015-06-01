@extends('app')

@section('content')
  @if(Auth::check())
  <div class="container">
    <section id='dashboard-overview'>
      <header>
        <h1>
          Willkommen in deiner Kommandozentrale, {{ Auth::user()->name }}.
        </h1>
      </header>
      <p>
        Hey {{ Auth::user()->name }}, das hier ist dein Dashboard. Hier findest du einen Überblick über das, was gerade in der Community
        passiert. Du kannst die Widgets nach deinen Vorlieben verschieben und teilweise auch customizen. Dies wird durch das
        <i class="glyphicon glyphicon-cog"></i>-Icon dargestellt.
      </p>
      <div class="row">
        <div class="stream col-lg-6 dashboard-widget">
          <section>
            <header>
              <h1>
                <a href="#">
                  <i class="glyphicon glyphicon-cog pull-right" style="padding: 10px 0; font-size: 18px; color: #555;"></i>
                </a>
                Newsstream
              </h1>
            </header>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
            <div class="newsstream-item">
              <a href="#">
                            <span>
                                <a href="#">David Semmisch</a> hat im Thema <a href="#">"Warum sind Ossis so toll?"</a> geantwortet.
                            </span>
                <small>Vor 5 Minuten</small>
              </a>
            </div>
          </section>
        </div>
        <div class="friendslist col-lg-6 dashboard-widget">
          <section>
            <header>
              <h1>
                Freundesliste
              </h1>
            </header>
            <ul>
              <li>
                <a href="#">
                  David Semmisch
                  <i class="glyphicon glyphicon-user pull-right"></i>
                  <i class="glyphicon glyphicon-envelope pull-right" style="padding: 5px;"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  Fabian Eßer
                  <i class="glyphicon glyphicon-user pull-right"></i>
                  <i class="glyphicon glyphicon-envelope pull-right" style="padding: 5px;"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  Stefan Golz
                  <i class="glyphicon glyphicon-user pull-right"></i>
                  <i class="glyphicon glyphicon-envelope pull-right" style="padding: 5px;"></i>
                </a>
              </li>
            </ul>
          </section>
        </div>
      </div>
      <div class="stats">
          <div class="col-lg-4">
              <h1>
                  1.035 Posts
              </h1>
          </div>
          <div class="col-lg-4">
              <h1>
                  139 Bewertungen
              </h1>
          </div>
          <div class="col-lg-4">
              <h1>
                  3 Jahre dabei
              </h1>
          </div>
      </div>
    </section>
  </div>
  @else
    <h1>Bitte logge dich ein.</h1>
  @endif
@endsection
