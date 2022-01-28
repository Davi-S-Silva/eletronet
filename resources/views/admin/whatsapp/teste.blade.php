@extends('admin.admin')

@section('content')
<form class="" action="http://localhost:3333/send-message" method="post" enctype="multipart/form-data">
   @csrf
    <div class="">
      <label for="">Numero</label>
      <input type="number" name="numero" placeholder="Digite um numero para enviar msg">
    </div>
    <div class="">
      <label for="">Mensagem</label>
      <textarea name="mensagem" rows="8" cols="80"></textarea>
    </div>
    <div class="">
      <input type="file" name="files" value="" multiple>
    </div>
<div class="">
    <input type="checkbox" name="users[]" value="5581986332809"> davi santos
    <input type="checkbox" name="users[]" value="5581973382722"> marcilene
</div>

    <input type="submit" name="Enviar" value="Enviar">
</form>
@endsection
