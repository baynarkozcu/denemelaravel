@extends("Admin.layouts.master")

@section("title2","Tüm Kategoriler")
@section("content")




<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Yeni Kategori Ekle</h6>
            </div>
            <div class="card-bod">
                <form method="POST" action="{{route("createCategory")}}" >
                    @csrf
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input type="text" class="form-control mx-auto col-md-8 " name="category" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">EKLE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">@yield("title2")</h6>
            </div>
            <div class="card-bod">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Kategori</th>
                                <th>Haber Sayısı</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as  $category)

                            <tr>
                                <td>{{$category->name}}</td>
                                <td>{{$category->newsCount()}}</td>
                                <td><a category-id="{{$category->id}}"  class="edit-click btn btn-sm btn-primary"><i class="fa fa-pen text-white"></i>Düzenle</a></td>
                                <td><a category-id="{{$category->id}}" newscount="{{$category->newsCount()}}"  class="remove-click btn btn-sm btn-danger"><i class="fa fa-trash"></i>Sil</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div id="modal" class="modal" >
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Kategori Düzenle</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
        <form method="POST" action="{{route("editdata")}}">
            @csrf
            <div class="form-group">
                <label>Kategori Adı</label>
                <input id="category" type="text" class="form-control" name="category">
                <input id="categoryID" type="hidden" class="form-control" name="id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                <button type="submit" class="btn btn-success">Kaydet</button>
            </div>
        </form>
        </div>

    </div>

    </div>
</div>



<!-- Modal -->
<div id="deletemodal" class="modal" >
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Kategoriyi Sil</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <div id="body" class="modal-body">
            <div class="alert alert-danger" id="newalert"></div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
            <form method="POST" action="{{route("deletedata")}}">
                @csrf
                <input type="hidden" name="id" id="removeID"/>
                <button type="submit" class="btn btn-danger">Sil</button>
            </form>

        </div>

    </div>

    </div>
</div>


@endsection


@section('js')


<script>
    $(function(){


        $('.edit-click').click(function(){
            id = $(this)[0].getAttribute('category-id');
            $.ajax({
                type:'GET',
                url:'{{route("getdata")}}',
                data:{id:id},
                success:function(data){
                    $('#category').val(data.name);
                    $('#categoryID').val(data.id);
                    $('#modal').modal();
                }
            });
        });


        $('.remove-click').click(function(){
            id = $(this)[0].getAttribute('category-id');
            newscount =  $(this)[0].getAttribute('newscount');
            $('#removeID').val(id);
            $('#newalert').html('');
            $('#body').hide();

            if(newscount>0){
                $('#newalert').html("Bu Kategoriye Ait "+newscount+" Haber Bulunmaktadır. Silmek İstediğinize Emin Misiniz?");
                $('#body').show();
            }

            $('#deletemodal').modal();


        });



    })
</script>

@endsection

