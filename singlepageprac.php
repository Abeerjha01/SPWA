<html>
<head>

  <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    function chk()
    {
        var name = document.getElementById('gname').value;
        var name2 = document.getElementById('lname').value;
        var ticker = document.getElementById('stock').value;
        var dataString = 'gname=' + name + '&lname=' + name2 + '&stock=' + ticker;
        $.ajax({
          type:"post",
          url:"hi.php",
          data:dataString,
          success: function(html){
            $('#msg').html(html);
          }
        });
        return false;
    }
    function func(){
      document.getElementById('head').textContent = "sdffsf";
    }
  </script>
</head>
<body>
    <h1 id = "head">This is a heading<h1>
    <button onclick = "func()">Change</button>
  <form>
    <input type = "date" id = "gname">
    <br/>
    <input type = "date" id = "lname">
    <input type = "text" id = "stock" value = "tsla">
    <input type = "submit" value = "submit" onclick = "return chk()">
  </form>
  <p id = "msg"></p>
</body>
</html>