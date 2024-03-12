@extends('layouts.guests')

@section('content')
<style>
h1 {
    margin-top: 20px;
    margin-bottom: 20px;
} 
form {
    margin-top: 20px;
    margin-bottom: 40px;
}


</style>
<div class="container">

<!-- 
    title (required)
    description
    city (required)
    address (required)
    when_at (required)
    picture
    finder    


 -->

 <h1>Send Message To Finder</h1>
 <hr>

@if (isset($_GET['created']) && $_GET['created'] == 'success')
    <div class="alert alert-success" role="alert">
        Message Sent successfully!
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('sendRequest', @request()->route('id')) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Enter Title">
        </div>

        <div class="form-group">
            <label for="message">Message *</label>
            <textarea class="form-control" id="message" name="message" required placeholder="Enter message"></textarea>
        </div>

        <div class="form-group">
            <label for="picture">Proof</label>
            <input type="file" class="form-control" id="picture" name="picture">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>



</div>



@endsection