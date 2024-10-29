<header>
    <table id="header-table">
        <tr>
            {{--            @if($shop->logo <> null)--}}
            {{--            <td class="logo"><img src="{{$shop->logo}}" height="55px"></td>--}}
            {{--            @endif--}}
            <td class="title"><h1>Business Wallet</h1></td>
            <td class="date">Date: {{date('d-M-Y')}}</td>
        </tr>
        <tr>
            <td class="address"><b>Prop: {{@$user->name}}</b><br>{{@$user->address}}</td>
            <td class="contact">
                <b>{{@$user->mobile_number}}</b>
{{--                <br>--}}
{{--                <b>03106775089</b>--}}
            </td>
        </tr>
    </table>
</header>
