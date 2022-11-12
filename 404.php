<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/all.min.css"  />
    <title>Errors</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .errors {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column
        }
     
        .errors  img {
            width: 30%;
            height: 30%;

        }
       
        .errors p {
           
            margin: 0;
            
        }
    </style>
</head>
<body>
    
    <div class="errors">
        <img src="./public/images/404.gif" alt="">    
        <button onclick="history.back()"> <i class="fa-solid fa-arrow-left"></i> go back</button>
    </div>
    
</body>
</html>