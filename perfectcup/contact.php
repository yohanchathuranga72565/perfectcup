<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">The Perfect Cup</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>The Perfect Cup</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3304.4496519318714!2d-118.37748778577425!3d34.08361968059733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2beb6d56b8821%3A0x271aa0344db0382f!2sJIVE!5e0!3m2!1sen!2slk!4v1592993824713!5m2!1sen!2slk" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-md-4">
                    <p>Phone:
                        <strong>123.456.7890</strong>
                    </p>
                    <p>Email:
                        <strong><a href="mailto:name@example.com">name@example.com</a></strong>
                    </p>
                    <p>Address:
                        <strong>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"></div>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name</label>
                                <input type="text" id="fname" name="fname" maxlength="25" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address</label>
                                <input type="email" id="email" name="email" maxlength="50" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message</label>
                                <textarea class="form-control" id="message" name="message" maxlength="500" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" id="contact" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; The Perfect Cup 2020</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- script -->
    <script type="text/javascript">
        $(document).ready(function (){
            $('#contact').click(function (event){
                event.preventDefault();

                // fname = $('#fname').val();
                // lname = $('#lname').val();
                // email = $('#email').val();
                // password = $('#password').val();

                $.ajax({
                    url : "sendmsg.php",
                    method : "post",
                    // data : "fname=" + fname + "&lname=" + lname + "&email=" +email+ "&password=" + password,
                    data : $('form').serialize(),
                    dataType : "text",
                    success : function (html) {
                        if(html == "true"){
                            $("#add_err2").html('<div class="alert alert-success"><strong>Message sent!</strong></div>');
                        }else if(html == "fname_long"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>First name</strong> must cannot exceed 50 characters.</div>');
                        }else if(html == "fname_short"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>First name</strong> must exceed 2 characters.</div>');
                        }else if(html == "email_long"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email</strong> must cannot exceed 50 characters.</div>');
                        }else if(html == "email_short"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email</strong> must exceed 2 characters.</div>');
                        }else if(html == "eformat"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Email</strong> format incorrect.</div>');
                        }else if(html == "message_long"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Message</strong> must cannot exceed 500 characters.</div>');
                        }else if(html == "message_short"){
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Message</strong> must exceed 2 characters.</div>');
                        }else{
                            $("#add_err2").html('<div class="alert alert-danger"><strong>Error</strong> processing request. Please try again.</div>');
                        }
                    },
                    beforeSend : function () {
                        $("#add_err2").html("loading...");
                    }
                });

            });
        });
    </script>

</body>

</html>
