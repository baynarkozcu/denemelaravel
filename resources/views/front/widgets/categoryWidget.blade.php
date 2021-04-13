
<div class="col-md-3">
    <div class="list-group">

        @foreach ($categories as $category )
        <a @if(Request::segment(2) != $category->name ) href="{{route("category",$category->name)}}" @endif  class="list-group-item @if(Request::segment(2) == $category->name ) active @endif  ">{{$category->name}}
            <span class="badge bg-danger float-right text-white">{{$category->newsCount()}}</span></a>
        @endforeach
</div>


</div>
