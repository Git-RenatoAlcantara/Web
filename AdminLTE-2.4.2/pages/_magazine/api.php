<?php 
$aprovada1 = "Aprovada > renatomeucorreio@gmail.com|renato96475870"
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Checker Magazine Luiza</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
    #box1{
        background-color: green;
        height: 50px;
    }
    #button{
        background-color: black;
        height: 50px;
    }
    #box2{
        background-color: yellow;
        height: 20px;
    }
</style>
<body>
<div class="container">
	<div class="row">
    
    </div>

    </div>

                 <?php 
                    if (isset($aprovada1)) {
                         $total = count($aprovada1);
                        for ($i=0; $i < $total ; $i++) { 
                            echo $aprovada1[$i];
                        }
                    }

                    if (isset($aprovada2)) {
                         $total = count($aprovada2);
                        for ($i=0; $i < $total ; $i++) { 
                            echo $aprovada2[$i];
                        }
                    }

                    if (isset($reprovada)) {
                        $total = count($reprovada);
                        for ($i=0; $i < $total ; $i++) { 
                            echo $reprovada[$i];
                        }
                    }
                ?>
			</div>
		</div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
