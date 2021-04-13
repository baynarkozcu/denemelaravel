@if (count($news) > 0)
    @foreach ($news as $new )
<div class="post-preview">
    <a href="{{route('newspage',$new->id)}}">
    <h2 class="post-title">
        {{$new->title}}
    </h2>
        <img src="https://digitalage.com.tr/wp-content/uploads/2014/05/Yandexin-g%C3%B6rsel-ile-g%C3%B6rsel-arama-%C3%B6zelli%C4%9Fi-hizmetinizde.jpg" />
    <span class="float-right"><h6> Kategori :  {{$new->getCategory->name}}</h6></span>
        </a>
        <br>
    <p class="post-meta">Posted by
        <a href="#">{{Illuminate\Support\Str::limit($new->content,85  )}}</a></p>

    {{$new->created_at->diffForHumans()}}
</div>

        <!--Foreach Döngüsünden Denen Değer $loop -->
        @if (!$loop -> last)
            <hr>
        @endif

    @endforeach

@else
<div class="alert alert-danger">
    <h3> Bu Kategoriye Ait Yazı Bulunamadı.. </h3>
</div>

@endif
{{$news->links("pagination::bootstrap-4")}}
