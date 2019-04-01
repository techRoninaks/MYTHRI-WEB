<!DOCTYPE html>
<html>
<head>
	<title>Error</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/head1.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <style>
    body, html {
      font-family: defaultBarlow;

      background:white;
    }
    * {
      box-sizing: border-box;

    }

    /* Create two equal columns that floats next to each other */
    .column {
      float: left;
      width: 50%;
      
    /* Should be removed. Only for demonstration */
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
    .content_listing {
      max-width: 600px;
      margin: auto;
      background: white;
      font-size: 18px;

    }
    .content1{
      line-height: 15px;
    }
    
    .cls-anchor {
      text-decoration:none;
      color: rgb(180, 180, 180);
      display: inline-block;

    }
    .cls-anchor:hover{
    color: black;
    }

    .previous {
      background-color: #f2f2f2;
      color: black;
    }

    .next {
      background-color: #f2f2f2;
      color: black;
    }

    .round{
      padding: 2px;
      width:40px;
      height:40px;
      text-align: center;
    }
    .previous:hover {
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
    }
    .next:hover {
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
    }
    div.absolute{
      line-height: 1px;
      padding-bottom: 18px;
    }
    .img-main {
      display: block;
      width: 100%;
      height: 350px;
    }
    .btns {
      background-color:  #f2f2f2;
      border: none;
      color: black;
      width:25%;
      height: 30px;
      /*min-width:25px; */
      /*padding: 12px 32px;*/
      text-align:center;
      display: inline-block;
      cursor: pointer;
      font-size: 1.3rem;
      font-family: defaultBarlowBold;
      margin-left: 10px;
      margin-right: 10px;
    }
    .btns:hover {
      background-color: #008CBA;
      color: white;
    }
    .content-text {
      font-size: 1.3rem;
      color:rgb(100,100,100);
      font-family: defaultBarlowBold;
    }
  </style>
  
</head>
<body>
 <div w3-include-html="head1.html" style="text-align: center;"></div>
 <br>
 <br>
 <div style="padding-left: 50px;">
 <h1 style="font-weight: bold ; text-align: center; "><strong><?php echo $_GET['error-code'] ?></strong><h1>
 <h3 style=" text-align: center;"> Oops...!Looks like we hit a wall.</h3><h4 class="content1" style="text-align: center;"><strong><a href="Home.html">Back to Home Page</a>
</strong> </h4>
</div>

<?php
// if (!function_exists('http_response_code_text'))
// {
//     function http_response_code_text($code = 403)
//     {
//         $text = 'Forbidden';
//         switch ($code)
//         {
//             case 400: $text = 'Bad Request'; break;
//             case 401: $text = 'Unauthorized'; break;
//             case 403: $text = 'Forbidden'; break;
//             case 404: $text = 'Not Found'; break;
//             case 500: $text = 'Internal Server Error'; break;
//             default:
//                 $text = 'Forbidden';
//             break;
//         }
//         return $text;
//     }
// }

// $code = 403;
// if(isset($_GET['code']{0}))
// {
//     $code = (int) $_GET['code'];
// }

// $text = http_response_code_text($code);
// echo json_encode(array('httpStatusCode' => $code, 'httpStatusText' => $text));



// $status = $_GET['code'];
// $codes = array(
//        403 => array('403 Forbidden', 'The server has refused to fulfill your request.'),
//        404 => array('404 Not Found', 'The document/file requested was not found on this server.'),
//        405 => array('405 Method Not Allowed', 'The method specified in the Request-Line is not allowed for the specified resource.'),
//        408 => array('408 Request Timeout', 'Your browser failed to send a request in the time allowed by the server.'),
//        500 => array('500 Internal Server Error', 'The request was unsuccessful due to an unexpected condition encountered by the server.'),
//        502 => array('502 Bad Gateway', 'The server received an invalid response from the upstream server while trying to fulfill the request.'),
//        504 => array('504 Gateway Timeout', 'The upstream server failed to send a request in the time allowed by the server.'),
// );

// $title = $codes[$status][0];
// $message = $codes[$status][1];
// if ($title == false || strlen($status) != 3) {
//        $message = 'Please supply a valid status code.';
// }
// // Insert headers here
// echo '<h1>'.$title.'</h1>
// <p>'.$message.'</p>';
// Insert footer here


$code=$_GET['error-code'];


?>

 <div w3-include-html="footer.html" style="margin-top: 24px;padding-top: 250px;"></div>
  <script type="text/javascript">
    includeHTML();
  </script>

</body>
</html>