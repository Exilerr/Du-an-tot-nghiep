@foreach($comments as $comment)
<ul>
<li><h1>{{ $comment->user->name }}</h1>
    <p>{{ $comment->body }}</p>
    <a href="" id="reply"></a>
    <ul>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" required />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
      <li>@include('partials._comment_replies', ['comments' => $comment->replies])</li>
    </ul>
  </li>
</ul>
</div>
@endforeach
