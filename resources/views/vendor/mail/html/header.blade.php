<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Vifland')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Vifland Logo">
@else
{{-- <img src="{{$message->embed(asset('logo/logo-s.png'))}}"> --}}
{{-- <img src="{{ asset('public/assets/logo/logo-s.png') }}"> --}}
<img src="https://i.imgur.com/yH7Xqtq.png" class="logo"alt ="Vifland Logo" style="width:100%,display:block">
@endif
</a>
</td>
</tr>
