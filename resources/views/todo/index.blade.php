<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="form-check form-check-inline">
    <input type="radio" class="form-check-input" name="all" value="0">
    <label class="form-check-label" for="all">すべて</label>
    <input type="radio" class="form-check-input" name="work" value="1">
    <label class="form-check-label" for="work">作業中</label>
    <input type="radio" class="form-check-input" name="complete" value="1">
    <label class="form-check-label" for="complete">完了</label>
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
        <td>{{$todo->id}}</td>
        <td>{{$todo->comment}}</td>
        @if($todo->status===1)
        <td><button onclick="{{$todo->status===2}}">作業中</button></td>
        @endif
        @if($todo->status===2)
        <td><button>完了</button></td>
        @endif
        <td><button type="submit" name="delete">削除</button></td>
      </tr>
    </tbody>
    @endforeach

  </table>
  <h3>新規タスクの追加</h3>
  <form method="POST" action="{{route('todo.store')}}">
    @csrf
    <input type="text" name="comment">
    <button type="submit" name="btn">追加</button>
  </form>
</body>

</html>