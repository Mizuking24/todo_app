@extends('layouts.app')
@section('title', 'TaskList')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
              <div class="card-header">ThisTask</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>タスク</th>
                    <th>担当者</th>
                    <th>期限</th>
                    <th>ステータス</th>
                  </tr>
                  <tr>
                    <td>{{ $task->task }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $task->limit }}</td>
                    <td>{{ $task->status }}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                      @if($task->user_id === $user->id)
                        <a href="{{ route('post.edit', ['id' => $task->id]) }}">編集</a>
                      @endif
                    </td>
                  </tr>
                </table>
                <a href="{{ route('post') }}">タスク一覧に戻る</a>
              </div>
              {{-- <p>累計登録者数{{ $userCount->count() }}人/月</p>
              <p>累計投稿数{{ $postCount->count() }}件/月</p> --}}
          </div>
        </div>
    </div>
  </div>
@endsection
