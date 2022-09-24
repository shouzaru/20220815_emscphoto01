<!-- resources/views/books.blade.php -->
@extends('layouts.app')
@section('content')
<!-- Bootstrapの定形コード… -->

<!-- ナビゲーションメニュー -->
<div class="container mt-2 mb-2">
        <ul class="nav nav-tabs">
            <il class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link">写真一覧</a>
            </il>
            <il class="nav-item">
                <a href="{{ route('photo.create') }}" class="nav-link active">写真アップロード</a>
            </il>
            <il class="nav-item">
                <a href="{{ url('players') }}" class="nav-link">選手登録</a>
            </il>
        </ul>
</div>

@can('isAdmin') <!-- roleがAdminのユーザーのみ以下を表示する -->
<div class="container">
    <div class="row">
        <div class="col">
            <h1>写真アップロード</h1>
            <div>
                <form action="{{ url('/photos/upload') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <!-- <input id="fileUploader" type="file" name="photo" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus> -->
                        <input id="fileUploader" type="file" name="photo[]" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>  <!--複数ファイルのアップロード-->
                    </div>
                    <button type="submit" class="btn btn-primary">送信する</button>
                    <!-- <button type="submit" class="btn btn-primary" onclick="UPLOAD()">送信する</button> -->
                </form>
            </div>
            <!-- <div>
                <progress id="DLProgress" value="0" max="0">0%</progress>
            </div> -->
        </div>
    </div>
</div>

<hr>

@else
<div class="container">
    <div class="row text-center">
        <h1>この権限では許可されていません。ログインしてください。</h1>
    </div>
</div>
@endcan
@endsection

<!-- <script>
    function UPLOAD(){
    let fileCount = document.getElementById("fileUploader").files.length;
    for(i=0; i<fileCount; i++){
    let bar = document.getElementById("DLProgress");
    bar.max = fileCount
    bar.value = i+1
        }
    }
</script> -->