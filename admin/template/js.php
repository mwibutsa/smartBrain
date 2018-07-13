<?php
/**
 * Created by PhpStorm.
 * User: Mwibutsa
 * Date: 30/06/2018
 * Time: 11:41
 */
?>
<script src="http://localhost/mwibutsa/smartBrain/bootstrap/jquery-3.3.1.js"></script>
<script src="http://localhost/mwibutsa/smartBrain/bootstrap/js/bootstrap.js"></script>
<script src="bootstrap/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advcode advlist autolink link image lists charmap print preview hr anchor pagebreak spellcheck",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nobreaking",
            "save table contextmenu dirextionality emotions template paste textcolor"
        ],
        content_css: "css/content.css",

        toolbar: "insertfile undo redo | stylesheet | bold italic | aligncenter aligncenter alignleft alignjustify | bullist numlist outdent indent | 1 ink image | print preview fullpage | code | video"
        ,style_formats:[{title: 'Bold text',inline: 'b'},{title:'Red text',inline: 'span', styles :{color : '#ff0000'}},
            {title:'Red header',block: 'h1',styles:{color:'#ff0000'}},
            {title: 'Example 1', inline: 'span',classes: 'example1'},
            {title: 'Example 2', inline: 'span',classes: 'example2'},
            {title: 'Table styles'},{title: 'Table row 1',selector :'tr',classes: 'tablerow1'}]
    });
</script>

