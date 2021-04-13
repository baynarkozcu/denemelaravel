@extends("Admin.layouts.master")

@section("title2","Haber Güncelle")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("haberler.update",$new->id)}}" enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="form-group">
                                    <label>Haber Başlık</label>
                                    <input type="text" name="title" class="form-control" value="{{$new->title}}" ></input>
                                </div>

                                <div class="form-group">
                                    <label>Haber Kategori</label>
                                    <select class="form-control" name="category" >
                                        <option value=""></option>
                                        @foreach ($categories as $category)
                                            <option @if($new->categoryID == $category->id) selected  @endif value="{{$category->id}} ">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Haber Resim</label>
                                    <input type="file" name="image" class="form-control" ></input>
                                </div>

                                <div class="form-group">
                                    <label>Haber Detay</label>
                                    <textarea  name="content" class="form-control" rows="5" >{{$new->content}}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Haber Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>



@endsection
