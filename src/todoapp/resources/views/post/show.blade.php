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
                        @if($post->user_id === $user->id)
                          <td>
                            <form method="POST" action="">
                              @csrf
                              <input type="submit" value="削除" onclick="window.confirm('{{ $post->title }}');">
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
