<?php 
//session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="connection" content="whotext">
    <meta name="author" content="alexis queune">

    <title>Who - connection</title>

    <!-- Bootstrap Core CSS -->
    <link href="_Style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>


    body {
        padding-top: 100px;
        background: url(_Picture/site/benoit.jpg);
        background-size: 25%;
        }

        #login {
        background-color:white;
        padding: 5%;
        }

        .carousel-content {
        display:flex;
        }


     /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="connection.php">Who <span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-picture"></span>
     <span class="glyphicon glyphicon-link"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="inscription.php">S'inscrire</a>
                    </li>
                    <!--<li>
                        <a href="deconnexion.php">déconect</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                    </li>-->
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="contact me by email" href="mailto:alexis.queune1@gmail.com">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
                <div id="login">
<div id="carousel-example" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    
            <div class="panel panel-default">
            <div class="panel-body">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:red;">Text <span class="glyphicon glyphicon-pencil"></span></span></h1>
                        </div>
                    </div>
                </div>
                
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:orange;">Pic <span class="glyphicon glyphicon-picture"></span></span></h1>                            
                        </div>
                    </div>
                </div>
                <!--<div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:green;">Music <span class="glyphicon glyphicon-volume-up"></span></span></h1>                            
                        </div>
                    </div>
                </div>-->
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:blue;">Link <span class="glyphicon glyphicon-link"></span></span></h1>                            
                        </div>
                    </div>
                </div>
                <!--<div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:pink;">Music <span class="glyphicon glyphicon-headphones"></span></span></h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:yellow;">Location <span class="glyphicon glyphicon-map-marker"></span></span></h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:green;">Video <span class="glyphicon glyphicon-facetime-video"></span></span></h1>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="carousel-content">
                        <div>
                            <h1>&nbsp;Who<span style="color:black;">Event <span class="glyphicon glyphicon-bookmark"></span></span></h1>
                        </div>
                    </div>
                </div>-->
                
            </div>
            
        </div>
    </div> 

</div>


                <!--<p class="lead" style="position:center;"><em>Who</em> signifie <em>Qui</em> en anglais. C'est fou hein?</p>-->
            
                <form action="connection_post.php" method="post" enctype="multipart/form-data">
                    <p>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/><br>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="mot de passe"/><br />
                    <input class="btn btn-success" type="submit" value="Se connecter"/> ou <a href="inscription.php">S'incrire</a>
                    </p>    
                </form>



    <h6>Handcooked with <span class="glyphicon glyphicon-heart"></span> by Q.I. <br><span class="glyphicon glyphicon-copyright-mark"></span> 2016 Alexis Queune</h6>

      </div>
</div>    




</div>
</div>

 </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="_Style/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_Style/js/bootstrap.min.js"></script>

    <script>

        setCarouselHeight('#carousel-example');

    function setCarouselHeight(id)
    {
        var slideHeight = [];
        $(id+' .item').each(function()
        {
            // add all slide heights to an array
            slideHeight.push($(this).height());
        });

        // find the tallest item
        max = Math.max.apply(null, slideHeight);

        // set the slide's height
        $(id+' .carousel-content').each(function()
        {
            $(this).css('height',max+'px');
        });
    }
</script>

 <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>


</body>

</html>
