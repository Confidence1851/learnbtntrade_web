<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ $admin_source }}/plugins/suneditor/css/suneditor.min.css" rel="stylesheet">
   <style>
       body{
           background-color: white;
       }
   </style>
</head>
<body>
    <h4>
        {{-- {!! $letter["subject"] ?? '' !!} --}}
    </h4>
    <div class="se-wrapper-inner se-wrapper-wysiwyg sun-editor-editable">
        {{-- {!! $letter["message"] ?? '' !!} --}}
    </div>
</body>
</html>