

<div>
    @foreach($books as $book)
        <th>{{$book->b_Id}}</th><br>
        <td>{{$book->Title}}</td><br>
        <td>{{$book->Author}}</td><br>
        <td>{{$book->Category}}</td><br>
        <td>{{$book->Description}}</td><br>
        <td>{{$book->Price}}</td><br>
        <img src="{{ $book->getMedia('cover')}}">
    @endforeach

</div>