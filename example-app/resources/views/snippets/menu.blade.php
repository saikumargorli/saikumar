<ul class ="menu">
            <li><a href="/" >home </a></li>
            <li><a href="/about" >about</a></li>
            <li><a href="/contact" >contact</a></li>
            <li><a href="/about/history" >History</a></li>
            <li><a href="/gallery" >Gallery</a></li>
            <li><a href="{{route('register')}}" >Registration</a></li>
            @auth
            <li><a href="{{route('calculator.form')}}" >Calculator App</a></li>
            @endauth
            @guest
            <li><a href="{{route('login')}}" >Login</a></li>
            @endguest
         

</ul>
@auth
<form action ="{{route ('logout')}}" method ="post">
                @csrf
                <button type="submit" style ="padding:10px 20px; background:red; margin:10px 0px;">Logout</button>
</form>
@endauth