<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
    <title>PHP Post/GET test</title>       
</head>

<body>

<h1>Fill the form</h1>
   
    <h2> Post form</h2>
    <form method="post" action="php-test.php">
    text:<input type="text" size =40 name="name">
    <input type=submit value="Submit Post">
    </form>
   
    <h2> GET form</h2>
    <form method="get" action="php-test.php">
    text:<input type="text" size =40 name="name">
    <input type=submit value="Submit Get" >
    </form>

<?php

    function stripFormSlashes($arr)
        {
        if (!is_array($arr))
                {
                return stripslashes($arr);
                }
            else
                {
                return array_map('stripFormSlashes', $arr);
                }
        }
   
    if (get_magic_quotes_gpc())
        {
        $_GET  = stripFormSlashes($_GET);
        $_POST = stripFormSlashes($_POST);
        }
               
    echo ("<br/>");
    echo ("<pre>");
    echo ("<h2>POST data:</h2>\n");
    print_r($_POST);
    echo("</pre>");

    echo ("<br/>");
    echo ("<pre>");
    echo ("<h2>GET data:</h2>\n");
    print_r($_GET);
    echo("</pre>");
   
    if($_GET['name'])
        {
        $name = $_GET['name'];
        }
               
    echo($name);

?>

<hr />

<?php echo 'PHP version: ' . phpversion() . ' on ' . $_SERVER['SERVER_SOFTWARE']; ?>

</body>
</html>