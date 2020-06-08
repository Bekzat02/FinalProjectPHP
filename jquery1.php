<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        span{
            cursor: pointer;
        }
        span.hilite{
            background: yellow;
        }
        div{
            display: inline;
            color: red;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
<h3>Find the modifiers- <div></div></h3>
<p>
    If you <span>really</span> want to go outside
    <span>in the cold</span> then make sure to wear
    your <span>warm</span> jacket given to you by
    your <span>favorite</span> teacher.
</p>
</body>
<script>
    $("span").click(function () {
        $(this).fadeOut(1000,function () {
            $("div").text("'"+$(this).text()+"' has faded!");
            $(this).remove();
        });
    });
    $("span").hover(function () {
        $(this).addClass("hilite");
    },function () {
        $(this).removeClass("hilite");
    });
</script>
</html>
