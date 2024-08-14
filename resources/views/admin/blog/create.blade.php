<!-- resources/views/blog/create.blade.php -->
<form action="{{route('generate-content')}}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Enter Blog Title">
    <button type="submit">Generate Content</button>
</form>