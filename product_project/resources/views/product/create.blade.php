<a href="/list">Product List</a>

<h1>create page</h1> <br>


<form action="addproduct" method="POST">
    @csrf
    <input type="text" name="productname" placeholder="Enter Product name"/><br>
    @error('productname')
        <span style="color:red">{{$message}}</span><br>
    @enderror<br>
    <input type="text" name="price" placeholder="Enter Product Price"/><br><br>
    @error('price')
        <span style="color:red">{{$message}}</span><br> <br>
    @enderror
    <button type="submit">ADD</button>

</form>