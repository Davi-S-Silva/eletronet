@extends('admin.index')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <form action="{{route('formempresa')}}" method="post" id="FormEmpresa" enctype="multipart/form-data">
        @csrf
        <h6>Empresa</h6>
        <div>
            <label for="">Nome da empresa</label>
            <input type="text" class="form-control" name="NomeEmpresa" id="">
        </div>
        <div>
            <input type="file" name="LogoEmpresa" id="">
        </div>
        <div>
            <label for="">Slogan da empresa</label>
            <input type="text" class="form-control" name="SloganEmpresa" id="">
        </div>
        <div>
            <label for="">Sobre da empresa</label>
            <textarea name="SobreEmpresa" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="">Contato da empresa</label>
            <input type="text" class="form-control" name="NumeroContatoEmpresa" id="">
            <input type="text" class="form-control" name="EmailContatoEmpresa" id="">
        </div>
        <div>
            <label for="">Localização da empresa</label>
            <input type="text" class="form-control" name="LocalizacaoEmpresa" id="">
        </div>  
        <div>
            <label for="">Area de cobertura da empresa</label>
            <input type="text" class="form-control" name="AreaCoberturaEmpresa" id="">
        </div>    
        <input type="submit" class="btn btn-primary"  value="Enviar">
    </form>

    <div>
        <section>
            <form action="{{url('novocontato')}}" name="Contatos" method="post">
                @csrf
                <div>
                    <label for="">Contatos da empresa</label>
                    <input type="text" class="form-control"name="NomeContatoEmpresa" id="">
                    <input type="text" class="form-control"name="NumeroContatoEmpresa" id="">
                    <input type="text" class="form-control"name="EmailContatoEmpresa" id="">
                </div>
                <input type="submit" class="btn btn-primary"  value="Add Contato">
            </form>
        </section>
<section>
    <form action="" name="Horarios" method="post">
        <div>
            <label for="">Horario da empresa</label>
            <input type="text" class="form-control" name="DiaFuncionamentoEmpresa" id="">
            <input type="time" class="form-control" name="AberturaEmpresa" id="">
            <input type="time" class="form-control" name="FechamentoEmpresa" id="">
        </div>
        <input type="submit" class="btn btn-primary"  value="Add Horário">
    </form>
</section>
<section>
    <form action="" name="RedesSociais" method="post">
        <div>
            <label for="">Redes Sociais da empresa</label>
            <input type="text" class="form-control" name="NomeRedeSocialEmpresa" id="">
            <input type="text" class="form-control" name="LinkRedeSocialEmpresa" id="">
        </div>
        <input type="submit" class="btn btn-primary"  value="Add Rede Social">
    </form>
</section>
<section>
    <form action="" name="Diferenciais" method="post">
        <div>
            <label for="">Diferenciais da empresa</label>
            <input type="text" class="form-control" name="IconeDiferenciaisEmpresa" id="">
            <input type="text" class="form-control" name="TituloDiferenciaisEmpresa" id="">
            <input type="text" class="form-control" name="DescricaoDiferenciaisEmpresa" id="">
            <input type="text" class="form-control" name="ImagemDiferenciaisEmpresa" id="">
        </div>
        <input type="submit" class="btn btn-primary"  value="Add Diferencial">
    </form>
</section>
<section>
    <form action="" name="Planos" method="post">
        <div>
            <label for="">Planos da empresa</label>
            <input type="text" class="form-control" name="TituloPlanoEmpresa" id="">
            <input type="text" class="form-control" name="InstalacaoPlanoEmpresa" id="">
            <input type="text" class="form-control" name="RoteadorPlanoEmpresa" id="">
            <input type="number" class="form-control" name="ValorPlanoEmpresa" id="">
        </div>
        <input type="submit" class="btn btn-primary"  value="Add Plano">
    </form>
</section>
        <section>
            <form action="" name="Duvidas" method="post">
                <div>
                    <label for="">Duvidas Frequentes</label>
                    <input type="text" class="form-control" name="TituloDuvidaEmpresa" id="">
                    <input type="text" class="form-control" name="RespostaDuvidaEmpresa" id="">
                </div>
                <input type="submit" class="btn btn-primary" value="Add Duvida">
            </form>
        </section>
    </div>
@endsection