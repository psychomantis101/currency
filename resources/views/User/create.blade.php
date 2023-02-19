<form method="POST" action="{{route('user.store')}}">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{old('name')}}">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{old('email')}}">

    <label for="rate">Rate:</label>
    <input type="number" name="rate" id="rate" step=".01" value="{{old('rate')}}">

    <label for="currency">Currency</label>
    <select id="currency" name="currency">
        @foreach($currencies as $key => $currency)
            <option value ="{{$key}}" {{old('currency') == $key ? 'selected' : ''}}>{{$currency}}</option>
        @endforeach
    </select>

    <input type="submit">
</form>
