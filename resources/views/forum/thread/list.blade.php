@extends('app')
@section('content')
  <table>
    @forelse($threads as $thread)
      <tr>
        <td>{{ thread.title }}</td>
        <td>{{ thread.createdBy }}</td>
        <td>{{ thread.creationTimestamp }}</td>
        <td>{{ thread.responses }}</td>
      </tr>
    @empty
      <tr>
        <td>Sorry! No threads yet.</td>
      </tr>
    @endforelse
  </table>
@stop