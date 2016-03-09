
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Statistiques</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    <script type="text/javascript" src="js/jscharts.js"></script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                        <h2 class="post-title">
                            Statistiques connexions
                        </h2>

                        <div id="graph">Loading graph...</div>

                        <script type="text/javascript">
                        	var myData = new Array([1996, 22], [1997, 36], [1998, 37], [1999, 45], [2000, 50], [2001, 55], [2002, 61], [2003, 61], [2004, 62], [2005, 66], [2006, 73]);
                        	var myChart = new JSChart('graph', 'line');
                        	myChart.setDataArray(myData);
                        	myChart.setTitle('Connexions');
                        	myChart.setTitleColor('#8E8E8E');
                        	myChart.setTitleFontSize(11);
                        	myChart.setAxisNameX('');
                        	myChart.setAxisNameY('');
                        	myChart.setAxisColor('#C4C4C4');
                        	myChart.setAxisValuesColor('#343434');
                        	myChart.setAxisPaddingLeft(100);
                        	myChart.setAxisPaddingRight(120);
                        	myChart.setAxisPaddingTop(50);
                        	myChart.setAxisPaddingBottom(40);
                        	myChart.setAxisValuesNumberX(6);
                        	myChart.setGraphExtend(true);
                        	myChart.setGridColor('#c2c2c2');
                        	myChart.setLineWidth(6);
                        	myChart.setLineColor('#9F0505');
                        	myChart.setSize(616, 321);
                        	myChart.setBackgroundImage('img/chart_bg.jpg');
                        	myChart.draw();
                        </script>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
