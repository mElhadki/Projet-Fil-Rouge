<?php
include('../../app/database/connect.php');
include('../../app/database/db.php');
include('../../app/controllers/middleware.php');
adminOnly();
include('../../app/helpers/validateProduct.php');
include('../../app/controllers/product.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>

<body>

    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <h1 style="text-align: center;">Add product</h1>
            <?php include('../../app/helpers/flashmessage.php') ?>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Back to product</a>
            <div class="form-group">
                <label for="my-input">Name product</label>
                <input id="my-input" class="form-control" type="text" name="nameProduct">
            </div>
            <div class="form-group">
                <label for="my-input">Price</label>
                <input id="my-input" class="form-control" type="text" name="Price">
            </div>
            <div class="form-group">
                <label for="my-input">Qte</label>
                <input id="my-input" class="form-control" type="number" name="Qte">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="button" onclick="infile()">
                    <input type="file" style="display:none" name="Image" id="fil">
                    <i class="fa fa-fw fa-camera"></i>
                    <span>Upload image 1</span>
                </button>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="button" onclick="infile1()">
                    <input type="file" style="display:none" name="Image2" id="fil1">
                    <i class="fa fa-fw fa-camera"></i>
                    <span>Upload image 2</span>
                </button>
            </div>
            <div class="form-group">
                <label for="my-textarea">Text</label>
                <textarea id="my-textarea" class="form-control" name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="my-select">Category</label>
                <select id="my-select" class="form-control" name="idC">
                    <option value=""></option>
                    <?php foreach ($categories_product as $cat) : ?>
                        <option value="<?php echo $cat['idC'] ?>"><?php echo $cat['nameCategory'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          
            <button name="addProduct" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/1gndqq8baocqi4iq981lay51zxdqhz8sdhjq6csuqk2eh0fm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>

    <script>
        function infile() {
            document.getElementById('fil').click()

        }
        function infile1() {
            document.getElementById('fil1').click()

        }
    </script>
</body>

</html>