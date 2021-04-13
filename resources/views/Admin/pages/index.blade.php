@extends("Admin.layouts.master")

@section("title2","Tüm Sayfalar")
@section("content")

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold float-left text-primary">Toplamda {{count($pages)}} Adet Sayfa Bulundu.</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Sayfa Başlık</th>
                                            <th>Sıralama</th>
                                            <th>Görüntüle</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        @foreach ($pages as  $page)

                                        <tr id="page_{{$page->id}}">

                                            <td>
                                                <img src="{{$page->pageImage}}" width="200" height="100">
                                            </td>
                                            <td>{{$page->pageTitle}}</td>
                                            <td class="text-center" style="width: 5px"><i class="handle fa fas fa-arrows-alt fa-3x" style="cursor: move"></i></td>

                                            <td><a href="{{route("page", $page->id)}}" class="btn btn-sm btn-success"><i class="fa fa-eye"></i>  Görüntüle</a></td>
                                            <td><a href="{{route("sayfaduzenle", $page->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i>  Düzenle</a></td>
                                            <td>

                                                <a href="{{route("sayfasil" , $page->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i>  SİL</a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



@endsection


@section('js')

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.13.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>
        $('#orders').sortable({
        handle:'.handle',
        update:function(){
            var siralama = $('#orders').sortable('serialize');

            $.get("{{route('siralama')}}?"+siralama  , function(data, status){
                console.log(data);
            });
        }
    });
</script>

@endsection
