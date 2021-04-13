@extends("Admin.layouts.master")

@section("title2","Silinen Haberler")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold float-left text-primary">Toplamda {{count($news)}} Adet Silinen Haber Bulundu.</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Haber Başlık</th>
                                            <th>Kategori</th>
                                            <th>Silinme Tarihi</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>Silinenlerden Çıkar</th>
                                            <th>Kalıcı Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as  $new)

                                        <tr>
                                            <td>
                                                <img src="https://www.dhresource.com/0x0s/f2-albu-g7-M00-B4-25-rBVaSlp2oDeAYqiJAAMya72Wvas426.jpg/pencere-duvar-ka-d-da-dere-dere-woods-do.jpg" width="200" height="100">
                                            </td>
                                            <td>{{$new->title}}</td>
                                            <td> @if ($new->getCategory)
                                                {{$new->getCategory->name}}
                                            @else
                                                Silinmiş Kategori
                                            @endif </td>
                                            <td>{{$new->deleted_at->diffForHumans()}}</td>
                                            <td>{{$new->created_at}}</td>
                                            <td><a href="{{route("restore",$new->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pen"></i>Silinenlerden Çıkar</a></td>
                                            <td><a href="{{route("hardDelete",$new->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection
