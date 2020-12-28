@extends('app')

@section('content')
<div class="form-check form-check-inline">
  <!-- <form action="{{route('todo.index')}}" method="get"> -->
  <input id="radio0" type="radio" class="form-check-input" name="search" value="0">すべて</input>
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
    @if($todo->status===0)
    <tr class="todo0">
      @elseif($todo->status===1)
    <tr class="todo1">
      @endif
      <td>{{$todo->id}}</td>
      <td>{{$todo->comment}}</td>
      @if($todo->status===0)
      <td>
        <form method="POST" action="{{route('todo.update',['id'=>$todo->id])}}">
          @csrf
          <button type="submit">作業中</button>
      </td>
      </form>

      @endif
      @if($todo->status===1)
      <td>
        <form method="POST" action="{{route('todo.update',['id'=>$todo->id])}}">
          @csrf
          <button type="submit">完了</button>
        </form>
      </td>
      @endif
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
<script>
let radio0 = document.getElementById('radio0');
let radio1 = document.getElementById('radio1');
let radio2 = document.getElementById('radio2');
let todo0s = document.querySelectorAll('.todo0');
let todo1s = document.querySelectorAll('.todo1');
radio0.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    todo0.style.display = ""
  })
  todo1s.forEach(todo1 => {
    todo1.style.display = ""
  })
})
radio1.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    todo0.style.display = ""
  })
  todo1s.forEach(todo1 => {
    todo1.style.display = "none"
  })
})
radio2.addEventListener('change', () => {
  todo0s.forEach(todo0 => {
    todo0.style.display = "none"
  })
  todo1s.forEach(todo1 => {
    todo1.style.display = ""
  })
})
</script>
@endsection