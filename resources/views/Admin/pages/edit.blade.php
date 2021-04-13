@extends("Admin.layouts.master")

@section("title2","Sayfa Güncelle")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("sayfaduzenlepost" , $page->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Haber Başlık</label>
                                    <input type="text" name="title" class="form-control" value="{{$page->pageTitle}}" ></input>
                                </div>


                                <div class="form-group">
                                    <label>Haber Resim</label>
                                    <input type="file" name="image" class="form-control" ></input>
                                </div>

                                <div class="form-group">
                                    <label>Haber Detay</label>
                                    <textarea  name="content" class="form-control" rows="5" >{{$page->pageContent}}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sayfa Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>



@endsection
