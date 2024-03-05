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

 <h1>Create a new item</h1>
 <hr>

@if (isset($_GET['created']) && $_GET['created'] == 'success')
    <div class="alert alert-success" role="alert">
        Item Added successfully!
    </div>
@endif


<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title *</label>
        <input type="text" class="form-control" id="title" name="title" required placeholder="Enter title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" required placeholder="Enter description"></textarea>
    </div>

    <div class="form-group">
        <label for="city">City *</label>
        <input type="text" class="form-control" id="city" name="city" required placeholder="Enter city">
    </div>

    <div class="form-group">
        <label for="address">Address *</label>
        <input type="text" class="form-control" id="address" name="address" required placeholder="Enter address">
    </div>

    <div class="form-group">
        <label for="when_at">When *</label>
        <input type="datetime-local" class="form-control" id="when_at" name="when_at" required>
    </div>

    <div class="form-group">
        <label for="picture">Picture</label>
        <input type="file" class="form-control" id="picture" name="picture" required>
    </div>

    <div class="form-group">
        <label for="finder">Finder</label>
        <input type="text" class="form-control" id="finder" name="finder" required placeholder="Enter finder">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>



</div>



@endsection