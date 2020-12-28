@extends('layouts.navbar')
   
@section('content')
<!-- !PAGE CONTENT! -->
<div class="container">
    <div id="item1" class="items">
        <a href="{{ url('/book') }}">
            <img class=" image" src="livres/1.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 1</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a>   
    </div>
    <div id="item2" class="items">
        <a href="#">
            <img class=" image" src="livres/2.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 2 </h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a>  
    </div>
    <div id="item3" class="items">
        <a href="#"><img class=" image" src="livres/3.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 3</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item4" class="items">
        <a href="#"><img class=" image" src="livres/4.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 4</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item5" class="items">
        <a href="#"><img class=" image" src="livres/5.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 5</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item6" class="items">
        <a href="#"><img class=" image" src="livres/6.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 6</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a>
    </div> 
    <div id="item7" class="items">
        <a href="#"><img class=" image" src="livres/7.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 7</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a>
    </div>
    <div id="item8" class="items">
        <a href="#"><img class=" image" src="livres/8.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 8</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item9" class="items">
        <a href="#"><img class=" image" src="livres/8.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 9</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item10" class="items">
        <a href="#"><img class=" image" src="livres/8.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 10</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item11" class="items">
        <a href="#"><img class=" image" src="livres/8.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 11</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <div id="item12" class="items">
        <a href="#"><img class=" image" src="livres/8.jpg" alt="livre" style="width:100% ;">
            <div>
                <h3>Livre 12</h3>
                <p>Lorem ipsum text praesent tincidunt ipsum lipsum.</p>
            </div>
        </a> 
    </div>
    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&raquo;</a>
    </div>
</div>
@endsection        