@extends('layouts.app')
@section('title', 'TaskList')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">未対応</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>タスク</th>
                    <th>期限</th>
                    <th></th>
                    <th></th>
                  </tr>
                  @foreach($posts as $post)
                    @if($post->status === "未対応")
                      <tr>
                        <td><a href="{{ route('post.show', ['id' => $post->id ]) }}">{{ $post->task }}</a></td>
                        <td>{{ $post->limit }}</td>
                        <td></td>
                        <td>
                          @if($post->user_id === $user->id)
                            <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}">
                              @csrf
                              <input type="submit" class="btn btn-outline-danger" value="削除" onclick="window.confirm('{{ $post->task }}を削除します。よろしいですか？');">
                            </form>
                          @endif
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
              {{-- <p>累計登録者数{{ $userCount->count() }}人/月</p>
              <p>累計投稿数{{ $postCount->count() }}件/月</p> --}}
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
              <div class="card-header">処理中</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>タスク</th>
                    <th>期限</th>
                    <th></th>
                    <th></th>
                  </tr>
                  @foreach($posts as $post)
                    @if($post->status === "処理中")
                      <tr>
                        <td><a href="{{ route('post.show', ['id' => $post->id ]) }}">{{ $post->task }}</a></td>
                        <td>{{ $post->limit }}</td>
                        <td></td>
                        @if($post->user_id === $user->id)
                          <td>
                            <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}">
                              @csrf
                              <input type="submit" class="btn btn-outline-danger" value="削除" onclick="window.confirm('{{ $post->task }}を削除します。よろしいですか？');">
                            </form>
                          </td>
                        @endif
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
              {{-- <p>累計登録者数{{ $userCount->count() }}人/月</p>
              <p>累計投稿数{{ $postCount->count() }}件/月</p> --}}
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
              <div class="card-header">完了</div>

              <div class="card-body">
                <table class="table">
                  <tr>
                    <th>タスク</th>
                    <th>期限</th>
                    <th></th>
                    <th></th>
                  </tr>
                  @foreach($posts as $post)
                    @if($post->status === "完了")
                      <tr>
                        <td><a href="{{ route('post.show', ['id' => $post->id ]) }}">{{ $post->task }}</a></td>
                        <td>{{ $post->limit }}</td>
                        @if($post->user_id === $user->id)
                          <td>
                            <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}">
                              @csrf
                              <input type="submit" class="btn btn-outline-danger" value="削除" onclick="window.confirm('{{ $post->task }}を削除します。よろしいですか？');">
                            </form>
                          </td>
                        @endif
                      </tr>
                    @endif
                  @endforeach
                </table>
              </div>
              {{-- <p>累計登録者数{{ $userCount->count() }}人/月</p>
              <p>累計投稿数{{ $postCount->count() }}件/月</p> --}}
          </div>
        </div>
    </div>
  </div>
@endsection