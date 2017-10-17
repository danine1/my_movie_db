<!DOCTYPE html>
<?php
require_once 'functions.php';
$db= db_connect();

$stmt = $db->prepare('SELECT imdb_id, name, year FROM imdb_movie');
$stmt ->execute();
$movies = $stmt->fetchAll();
$inp=null;
$count=null;
$find=null;

if ($_POST)
{
    $inp=strtolower($_POST['search']);
    $count=strlen($inp);

    foreach($movies as $movie)
    if($inp == strtolower(substr($movie['name'], 0, $count)))
    {
        $find[]=$movie;
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Withnail and I</title>
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <div class="container">
  <a class="navbar-brand m-logo" href="#home"><img class="img-fluid" src="images\MovieBuff-logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item colour">
        <a class="nav-link" href="#posters">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#cast">Cast</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#trailer">Trailer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#ratings">Ratings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#review">Submit Review</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item colour">
        <a class="nav-link" href="http://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i>
</a>
      </li>
    </ul>
  </div>
  </div><!--closes container-->
</nav>

<div class="showcase">
    <div class="container">
    <h1>Movie Buff</h1>
    <p class="lead">Welcome to Movie Buff - "Withnail and I"</p>
    <a href="#review" class="btn btn-danger">Submit a Review</a>
    </div>
</div>

<form action="" method="post">
        <input type="text" name="search">
        <input type="submit">
    </form>

    <ul>
        <?php if($_POST){foreach($find as $mov): ?>
            <a href="movie.php?id=<?php echo $mov['imdb_id']?>"><li><?php echo $mov['name']?> (<?php echo $mov['year']?>)</li></a>
        <?php endforeach;}?>
    </ul>

<div class="container">

        <section id="section-a">
          <div class="container mt-5">
                <div class="row">
                        <div class="col-lg-4 mt-2 text-center">
                            <i class="fa fa-film mb-2" aria-hidden="true"></i>
                            <h3>What kind of film is it?</h3>
                            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero voluptatem itaque repellat facilis, asperiores quod ad nesciunt in, repudiandae, vero dolores. Quibusdam natus vel maxime omnis fugiat vero exercitationem commodi.</p>
                        </div>
                        <div class="col-lg-4 mt-2 text-center back">
                            <i class="fa fa-ticket mb-2" aria-hidden="true"></i>
                            <h3>Where can you watch?</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero voluptatem itaque repellat facilis, asperiores quod ad nesciunt in, repudiandae, vero dolores. Quibusdam natus vel maxime omnis fugiat vero exercitationem commodi.</p>
                        </div>
                        <div class="col-lg-4 mt-2 text-center">
                            <i class="fa fa-trophy mb-2" aria-hidden="true"></i>
                            <h3>Is it a winner?</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero voluptatem itaque repellat facilis, asperiores quod ad nesciunt in, repudiandae, vero dolores. Quibusdam natus vel maxime omnis fugiat vero exercitationem commodi.</p>
                        </div>
                </div>
          </div>
        </section>

        <section id="posters">
          <div class="container mt-5">
                <div class="row">
                        <div class="col-lg-4 mt-2">
                              <img class="img-fluid center" src="images/grant.jpg" alt="Withnail Poster1">
                        </div>
                        <div class="col-lg-4 mt-2">
                              <img class="img-fluid center" src="images/withnail-i-promo.jpg" alt="Withnail Poster2">
                        </div>
                        <div class="col-lg-4 mt-2">
                              <img class="img-fluid center" src="images/withnail2.jpg" alt="Withnail Poster3">
                        </div>
                </div>
          </div>
        </section>


      <section id="cast">
      <div class="container mt-5">
          <div class="row">
              <div class="col-lg-4 mb-3 pt-5">
                <li>Richard E. Grant - Withnail</li>
                <li>Paul McGann -	& I</li>
                <li>Richard Griffiths - Monty</li>
                <li>Ralph Brown -	Danny</li>
                <li>Michael Elphick -	Jake</li>
                <li>Daragh O'Malley -	Irishman</li>
                <li>Michael Wardle -Isaac Parkin</li> 
                <li>Una Brandon-Jones - Mrs. Parkin</li> 
                <li>Noel Johnson -General</li>
                <li>Irene Sutcliffe -	Waitress</li>
                <li>Llewellyn Rees - Tea Shop Proprietor</li>
                <li>Robert Oates -Robert Oates</li>
                <li> Anthony Wise - Policeman 2</li>
                <li> Eddie Tagoe -	Presuming Ed</li>
              </div>
              <div class="col-lg-8">
                  <div class="row">
                      <div class="col-lg-12 col-md-6">
                       <img class="img-fluid" src="images/withnail.jpg" alt="">
                      </div>
                      <div class="col-lg-12 p-3 col-md-6">
                        <p><strong>London, 1969</strong> - two 'resting' (unemployed and unemployable) actors, Withnail and Marwood, fed up with damp, cold, piles of washing-up, mad drug dealers and psychotic Irishmen, decide to leave their squalid Camden flat for an idyllic holiday in the countryside, courtesy of Withnail's uncle Monty's country cottage. But when they get there, it rains non-stop, there's no food, and their basic survival skills turn out to be somewhat limited. Matters are not helped by the arrival of Uncle Monty, who shows an uncomfortably keen interest in Marwood...</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </section>

      <section id="trailer">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="trailer">
                        <iframe width="960" height="615" src="https://www.youtube.com/embed/d9Z0DV33gAY" frameborder="0" allowfullscreen></iframe>
                      </div>
                    </div>
                </div>
            </div>
      </section>


      <section id="ratings">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                    <div class="progress mt-4">
                      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 94%; height:30px;">Rotten Tomatoes (94%)</div>
                    </div>
                    <div class="progress mt-4">
                      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 78%; height:30px;">IMDB (78%)</div>
                    </div>
                    <div class="progress mt-4">
                      <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 92%; height:30px;">Roger Ebert (92%)</div>
                    </div>
                    </div>
                    <div class="col-md-6 mt-3">
                      <p>"Set in 1969 England, it portrays the last throes of a friendship mirroring the seedy demise of the hippie period, delivering some comic gems along the way."</p><br>
                      <p>"A biting script from writer-director Bruce Robinson and performances from Richard E Grant and Paul McGann as two 'resting' actors, Withnail and 'I', that neither has surpassed."</p><br>
                      <p>"One of the funniest elements of Withnail & I is that it concerns three varieties of drama queen: the flamboyantly dark-minded Withnail; neurotic, ill-equipped Marwood, and the larger-than-life Monty. "</p><br>
                    </div>
                </div>
            </div>
      </section>


      <section id="review">
        <div class="container mt-5">
            <div class="review-sub">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Submit A Review</h2>
                    </div>
                </div>
                <form method="post" class="form">

                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>First Name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="firstname">
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>Email:</label>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" type="email" name="user_email" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-2">
                            <label>Review:</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                        <!--<div class="col-lg-2">
                            <label>I agree with terms:</label>
                        </div>
                        <div class="col-lg-4">
                        <input type="checkbox" name="terms" value="1">
                        </div> -->
                        <div class="row justify-content-center">
                        <div class="col-lg-8 ">
                        <input class="form-control btn btn-danger" type="submit" value="Submit">
                        </div>
                        </div>
                </form>
            </div>
        </div>
    </section>


      <footer>
            <div class="container text-center mt-5">
                <div class="row">
                    <div class="col-lg-12">
                      <p>&copy;&nbsp;Ronan Dineen</p>
                    </div>
                </div>
            </div>
      </footer>





















</div>


<script src="js/jquery.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script> 

</body>
</html>