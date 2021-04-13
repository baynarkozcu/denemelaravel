@extends("Admin.layouts.master")

@section("title2","Haber Oluştur")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route("haberler.store")}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Haber Başlık</label>
                                    <input type="text" name="title" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Haber Kategori</label>
                                    <select class="form-control" name="category" required>
                                        <option value="">İlgili Kategoriyi Seçiniz</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Haber Resim</label>
                                    <input type="file" name="image" class="form-control" required></input>
                                </div>

                                <div class="form-group">
                                    <label>Haber Detay</label>
                                    <textarea  name="content" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Haber Oluştur</button>
                                </div>
                            </form>
                        </div>
                    </div>



@endsection
