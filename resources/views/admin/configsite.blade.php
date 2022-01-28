@extends('admin.index')

@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <label for="">Banner Principal</label>
            <input type="file" src="" alt="">
        </div>
        <div>
            <label for="">Tema do site</label>
            <input type="file" name="" id="">
        </div>        
    </form>
@endsection