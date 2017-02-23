<html>
    <head>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="{{url module=frontend controller=index}|rtrim:'/'}/custom/plugins/WbmViewportResizer/Resources/views/frontend/_public/src/js/jresize.js"></script>
        <style>
            body#viewport-resizer-body {
                width:100%;
                height:100%;
                margin:0;
                padding:0;
                background:#000;
                padding-top:85px;
                overflow:hidden;
            }
            iframe#viewport-resizer-frame {
                width:100%;
                border:0;
                height:100%;
                height:calc(100% - 85px);
            }
        </style>
    </head>
    <body id="viewport-resizer-body">
        <iframe src="{$homeUrl}" id="viewport-resizer-frame">
    </body>
</html>