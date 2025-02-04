<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
       search:  <input type="url" id="url" name="url" placeholder="search here" required>
        GO : <button type="submit" name="key_submit">GO</button>
</form>
    <?php 
    if(isset($_POST['url'])){
        $url = filter_var($_POST['url'], FILTER_SANITIZE_URL);
          // Validate the URL format
          if (filter_var($url, FILTER_VALIDATE_URL)) {
            header("Location: $url");
            exit;}
            else {
                echo "<p style='color:red;'>Invalid URL. Please enter a valid one.</p>";
            }
    }
    ?>
</body>
</html>