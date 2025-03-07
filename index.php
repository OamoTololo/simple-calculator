<?php
    // Initialize cookies to store the first number, operator, and result
    $cookieName1 = "num";
    $cookieValue1 = "";
    $cookieName2 = "op";
    $cookieValue2 = "";
    $cookieName3 = "=";
    $cookieValue3 = "";

    // Handle number input
    if(isset($_POST['num'])) {
        $num = $_POST['input'].$_POST['num'];
    } else {
        $num = "";
    }

    // Handle operator input
    if(isset($_POST['op'])) {
        $cookieValue1 = $_POST['input'];
        setcookie($cookieName1, $cookieValue1, time() + (86400 * 30), "/");

        $cookieValue2 = $_POST['op'];
        setcookie($cookieName2, $cookieValue2, time() + (86400 * 30), "/");

        $num = "";
    }

    // Handle equal input
    if(isset($_POST['equal'])) {
        $num = $_POST['input'];

        switch($_COOKIE[$cookieName2]) {
            case "+":
                $num = $_COOKIE[$cookieName1] + $num;
                break;
            case "-":
                $num = $_COOKIE[$cookieName1] - $num;
                break;
            case "*":
                $num = $_COOKIE[$cookieName1] * $num;
                break;
            case "/":
                $num = $_COOKIE[$cookieName1] / $num;
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        .calc{
            margin: auto;
            background-color: black;
            border: 2px solid whitesmoke;
            width: 25%;
            height: auto;
            min-height: 35px; /* Increased height by 5% */
            border-radius: 20px;
            box-shadow: 10px 10px 40px rgba(0, 0, 0, 0.5);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box; /* Ensure padding is included in the width and height */
        }

        .maininput{
            width: 100%;
            height: 60px;
            margin-bottom: 20px; /* Increased margin for better spacing */
            border: 1px solid grey;
            border-radius: 10px;
            font-size: 20px;
            box-sizing: border-box;
            text-align: right; /* Align text to the right */
            padding-right: 10px; /* Padding for text alignment */
        }

        .button-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            width: 100%; /* Ensure the container spans the full width */
            box-sizing: border-box; /* Ensure padding is included in the width */
        }

        .numbtn, .calbtn, .c, .equal {
            width: 100%; /* Ensure buttons span the full width of their container */
            padding: 25px; /* Increased padding for bigger buttons */
            border-radius: 50%; /* Make buttons more circular */
            font-size: 18px;
            text-align: center;
            cursor: pointer;
            box-sizing: border-box; /* Ensure padding is included in the width */
        }

        .numbtn {
            background-color: #f0f0f0;
        }

        .numbtn:hover {
            background-color: #b1adad;
            color: white;
        }

        .calbtn {
            background-color: #ff9500;
            color: white;
        }

        .calbtn:hover {
            background-color: #d37f09;
            color: white;
        }

        .c {
            background-color: #ff3b30;
            color: white;
        }

        .c:hover {
            background-color: #d32f2a;
            color: white;
        }

        .equal {
            background-color: #34c759;
            color: white;
        }

        .equal:hover {
            background-color: #2daa4b;
            color: white;
        }

    </style>
</head>
<body>
    <div class="calc">
        <form action="" method="post">
            <input type="text" class="maininput" name="input" value="<?php echo $num; ?>"> <!-- Updated value attribute -->
            <div class="button-container">
                <input type="submit" class="numbtn" name="num" value="7">
                <input type="submit" class="numbtn" name="num" value="8">
                <input type="submit" class="numbtn" name="num" value="9">
                <input type="submit" class="calbtn" name="op" value="+">
                <input type="submit" class="numbtn" name="num" value="4">
                <input type="submit" class="numbtn" name="num" value="5">
                <input type="submit" class="numbtn" name="num" value="6">
                <input type="submit" class="calbtn" name="op" value="-">
                <input type="submit" class="numbtn" name="num" value="1">
                <input type="submit" class="numbtn" name="num" value="2">
                <input type="submit" class="numbtn" name="num" value="3">
                <input type="submit" class="calbtn" name="op" value="*">
                <input type="submit" class="c" name="num" value="C">
                <input type="submit" class="numbtn" name="num" value="0">
                <input type="submit" class="equal" name="equal" value="=">
                <input type="submit" class="calbtn" name="op" value="/">
            </div>
        </form>
    </div>
</body>
</html>