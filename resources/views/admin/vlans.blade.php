<?php
use App\Classes\Mikrotik\ApiMikrotik;
$Api = new ApiMikrotik();
?>

<div class="vlansclientes">
    vlan {{($vlan==0)?$vlan:'2'.$vlan}} -
    {{$Api->getCountUserOneVlan($vlan)}} Clientes Conectados
    <br>
    @foreach ($userVlan as $item)
        <div class="clientevlan">
            {{$item['name']}}
            <div>
                <a href="http://{{$item['address']}}:{{$porta=5252}}" rel="noopener noreferrer" target="_blank">{{$item['address']}}</a>
                <a href="{{route('cliente',$item['.id'])}}">+</a>
            </div>
        </div>
    @endforeach
</div>
