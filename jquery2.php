<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body>
<button class="Fade">Fade</button>
<button class="Toggle">Toggle</button>
<p>
    This is the paragraph to end all paragraphs. You
    should feel <em>lucky</em> to have seen such a paragraph in your life. Congratulations!
</p>

<script>
    $(document.body).click()
    {
        var beka = false;
            $(".Fade").click(function () {
                if (beka === false) {
                    $("p").fadeOut("slow");
                    beka = true;
                }
                else{
                        $("p:hidden").fadeIn("slow");
                        beka = false;
                }
            });
            $(".Toggle").click(function () {
                $("p").slideToggle("slow");
            });
        }
</script>
</body>
</html>