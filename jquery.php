<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>stop demo</title>
    <style>
        div {
            position: absolute;
            background-color: #8b221d;
            left: 0px;
            top: 30px;
            width: 60px;
            height: 60px;
            margin-top: 15px;
        }
        div.opacity{
            opacity: 0.4;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>

<button id="go">Go</button>
<button id="stop">STOP!</button>
<button id="back">Back</button>
<div class="block"></div>

<script>
    $( "#go" ).click(function() {
        $( ".block" ).animate({ left: "+=500px" }, 2000 );
    });

    $( "#stop" ).click(function() {
        $( ".block" ).stop();
        $(".block").addClass("opacity");
    });

    $( "#back" ).click(function() {
        $( ".block" ).animate({ left: "-=300px" }, 2000 );
    });
</script>

</body>
</html>