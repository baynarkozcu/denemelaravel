@extends("Admin.layouts.master")

@section("title2","Tüm Haberler")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold float-left text-primary">Toplamda {{count($news)}} Adet Haber Bulundu.</h6>
                            <a href="{{route("silinenler")}}" class="float-right btn btn-warning btn-sm"><i class="fa fa-trash"></i>Silinen Haberler</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Haber Başlık</th>
                                            <th>Kategori</th>
                                            <th>Oluşturulma Tarihi</th>
                                            <th>Görüntüle</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news as  $new)
                                        <tr>
                                            <td>
                                                <img @if ($new->image == "")
                                                src="https://www.dhresource.com/0x0s/f2-albu-g7-M00-B4-25-rBVaSlp2oDeAYqiJAAMya72Wvas426.jpg/pencere-duvar-ka-d-da-dere-dere-woods-do.jpg" width="200" height="100"
                                                    @else src="{{asset("images/$new->image")}}"  width="200" height="100"
                                                @endif >
                                            </td>
                                            <td>{{$new->title}}</td>
                                            <td>{{$new->getCategory->name}}</td>
                                            <td>{{$new->created_at->diffForHumans()}}</td>
                                            <td><a href="{{route("newspage",$new->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>  Görüntüle</a></td>
                                            <td><a href="{{route("haberler.edit",$new->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i>  Düzenle</a></td>
                                            <td>

                                                <!--
                                            <form method="POST" action="{{route("haberler.destroy", $new->id)}}">
                                            @csrf
                                            @method("DELETE")
                                                <button type="submit" title="SİL" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>SİL</button>
                                            </form>
                                                -->

                                                <a href="{{route("delete",$new->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>  SİL</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection
