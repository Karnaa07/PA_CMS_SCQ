<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/9i4ty3dj7s5dyw4g2xbzg2u7udwf4mliqo7r71asossk42gb/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<?php $this->includePartial("form", $article->getArticleForm()) ?> 

<script type="text/javascript">
    var parsecontent = <?php echo json_encode($pageid); ?>;
    console.log(parsecontent)
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
    <script src="../js/addArticle.js" referrerpolicy="origin"></script>
</body>
</html>