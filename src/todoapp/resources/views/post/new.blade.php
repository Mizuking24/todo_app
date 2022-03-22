@extends('layouts.app')
@section('title', 'NewTask')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">NewTask</div>

              <div class="card-body">
                <form method="POST" action="{{ route('post.create') }}">
                  @csrf
                  <table class="table">
                    <tr>
                      <th>タスク名</th>
                      <td><input class="form-control" type="text" name="task"></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>期限</th>
                      <td><input type="date" min="2022-03-20" max="2030-04-01" name="date"></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <th>ステータス</th>
                      <td>
                        <input type="radio" name="status" value="未対応">未対応
                        <input type="radio" name="status" value="処理中">処理中
                        <input type="radio" name="status" value="完了">完了
                      </td>
                    </tr>
                    <tr>
                      <th></th>
                      <td><input class="btn btn-secondary" type="submit" value="登録"></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </form>
                <a href="{{ route('post') }}">タスク一覧に戻る</a>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection