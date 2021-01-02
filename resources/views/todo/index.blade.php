@extends('app')

@section('content')
<div class="form-check form-check-inline">
  <!-- <form action="{{route('todo.index')}}" method="get"> -->
  <input id="radio0" type="radio" class="form-check-input" name="search" value="0" checked>すべて</input>
  <input id="radio1" type="radio" class="form-check-input" name="search" value="1">作業中</input>
  <input id="radio2" type="radio" class="form-check-input" name="search" value="2">完了</input>
  <!-- <button type="submit">検索</button> -->
  <!-- </form> -->
</div>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>コメント</th>
      <th>状態</th>
      <th></th>
    </tr>
  </thead>
  @foreach($todos as $todo)
  <tbody>
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$todo->comment}}</td>

      <td>
        <form method="POST" action="{{route('todo.update',['id'=>$todo->id])}}">
          @csrf
          @if($todo->status===0)
          <button type="submit" class="work">作業中</button>
          @endif
          @if($todo->status===1)
          <button type="submit" class="done">完了</button>
          @endif
      </td>
      </form>
      <td>
        <form action="{{route('todo.destroy',['id'=>$todo->id])}}" method="POST">
          @csrf
          <button type="submit">削除</button>
        </form>
      </td>
    </tr>
  </tbody>
  @endforeach

</table>
<h3>新規タスクの追加</h3>
<form method="POST" action="{{route('todo.store')}}">
  @csrf
  @error('comment')
  <div>
    {{$message}}
  </div>
  @enderror
  <input type="text" name="comment">
  <button type="submit" name="btn">追加</button>
</form>
@endsection