<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice editor</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/css/bootstrap.min.css" integrity="sha384-MIwDKRSSImVFAZCVLtU0LMDdON6KVCrZHyVQQj6e8wIEJkW4tvwqXrbMIya1vriY" crossorigin="anonymous">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/87wkobbkbhk1hmj92en7s7v1vqc064xauiic54qr8hmvw5y3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <style>
    .form-control {
    display: inline-block;
    width: 12%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    background-color: #f5f5f5;
    /* margin-top: 2px; */
    position: relative;
    top: 2px;
}
  </style>
</head>
<body>
    <?php $html='';
    if($_GET['type']==1){
        // echo __DIR__.'/templates/pdf/'.$_GET['name'];die;
        $html=file_get_contents(__DIR__.'/templates/pdf/'.$_GET['name']);
    }else{
        $html=file_get_contents(__DIR__.'/templates/email/'.$_GET['name']);
    }
    
    
    ?>
<form action="pdfHtmlPreview.php" method="post"  >
<textarea name="editor" id="mytextarea" style="width: 100%;
  height: 650px;"><?=$html; ?></textarea>
</form>

<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

</body>
</html>