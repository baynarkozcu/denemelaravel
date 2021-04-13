@extends("Admin.layouts.master")

@section("title2","Sayfa Oluştur")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("sayfapost")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Sayfa Başlık</label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>


                                <div class="form-group">
                                    <label>Haber Resim</label>
                                    <input type="file" name="image" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Sayfa İçerik</label>
                                    <textarea  name="content" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Sayfa Oluştur</button>
                                </div>
                            </form>
                        </div>
                    </div>



@endsection
