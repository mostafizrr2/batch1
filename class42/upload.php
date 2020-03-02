<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <br>
     <a href="images.php">All images</a>
    <br><br>
    <div class="container">
        <form action="action.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" class="form-control"> <br><br>
            <input type="file" name="image" class="form-control"> <br><br>
            <button type="submit" name="submit"  class="btn btn-primary">Upload Image</button>
        </form>
    </div>
</body>
</html>
