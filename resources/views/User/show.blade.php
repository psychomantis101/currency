<h1>{{$user->name}}</h1>
<p>Rate: {{$user->rate}}</p>
<p>Default Currency: {{$user->currency->name}}</p>

<ul>
    @foreach($currencies as $key => $currency)
        <li>{{$key}}:{{$currency}}</li>
    @endforeach
</ul>
