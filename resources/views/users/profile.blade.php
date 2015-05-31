@extends('app')
@section('content')
  <div>
    <form class='form-horizontal'>
      <legend>
        Persönliche Angaben
      </legend>
      <div class='form-group'>
        <label for="first_name" class="col-lg-2 control-label pt-left">
          Name
        </label>

        <div class="col-lg-4">
          <input type='text' name='user_name' disabled class='form-control' value='{{ $user->name }}'/>
        </div>
        <div class='col-lg-6'>
          <h6>- Eine tolle Description</h6>
        </div>
      </div>
      <div class='form-group'>
        <label for="first_name" class="col-lg-2 control-label pt-left">
          E-Mail Adresse
        </label>

        <div class="col-lg-4">
          <input type='text' name='email' class='form-control' value='{{ $user->email }}'/>
        </div>
      </div>
      <legend>
        Passwort
      </legend>
      <div class='form-group'>
        <label for="first_name" class="col-lg-2 control-label pt-left">
          Passwort
        </label>

        <div class="col-lg-4">
          <input type='password' name='first_name' class='form-control'/>
        </div>
      </div>
      <div class='form-group'>
        <label for="first_name" class="col-lg-2 control-label pt-left">
          Passwort wiederholen
        </label>

        <div class="col-lg-4">
          <input type='password' name='first_name' class='form-control'/>
        </div>
      </div>
      <button class="btn btn-primary submit pull-right">Speichern</button>
    </form>
  </div>
@stop