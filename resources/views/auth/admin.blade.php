<h1>This is sample Form page</h1>
<form action="{{Route('admin.submit')}}" method="post">
    @csrf
    <label for="">first name</label>
    <input type="text" name="fname" id="fname"><br>
    <label for="">last name</label>
    <input type="text" name="lname" id="lname"><br>
    <label for="">Phone</label>
    <input type="text" name="number" id="number"><br>
    <label for="">Address</label>
    <input type="textarea" name="address" /><br>
    <input type="submit" name="submit" value="submit">
</form>