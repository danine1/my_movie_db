<?php
require_once 'functions.php';
$db= db_connect();

$stmt= $db->prepare(
    'SELECT imdb_movie.imdb_id, 
    imdb_movie_type.type_name, 
    imdb_movie_status.status_name,
    imdb_movie.name,
    imdb_movie.length,
    imdb_movie.year,
    imdb_movie.start_year,
    imdb_movie.end_year,
    imdb_movie.rating,
    imdb_movie.votes_nr,
    imdb_movie.metascore,
    imdb_certification.label
    FROM imdb_movie 
    LEFT OUTER JOIN imdb_movie_type ON imdb_movie.imdb_movie_type_id=imdb_movie_type.id
    LEFT OUTER JOIN imdb_movie_status ON imdb_movie.imdb_movie_status_id=imdb_movie_status.id    
    LEFT OUTER JOIN imdb_certification ON imdb_movie.imdb_certification_id=imdb_certification.id  
    WHERE imdb_id = ?;');
    $stmt->execute([$_GET['id']]);
    $mov= $stmt->fetch(); //array of all the columns of specific movie
    //var_dump($mov);
    
    $stmt = $db->prepare(
        'SELECT imdb_person.fullname,
        imdb_movie_has_person.imdb_position_id 
        FROM imdb_movie_has_person 
        LEFT OUTER JOIN imdb_person ON imdb_movie_has_person.imdb_person_id=imdb_person.imdb_id
        WHERE imdb_movie_id=?;');
    $stmt ->execute([$_GET['id']]);
    $per = $stmt->fetchAll();
    //var_dump($per);
    
    $stmt = $db->prepare(
        'SELECT imdb_genre.genre_name 
        FROM imdb_movie_has_genre 
        LEFT OUTER JOIN imdb_genre ON imdb_movie_has_genre.imdb_genre_id=imdb_genre.id
        WHERE imdb_movie_id=?;');
    $stmt ->execute([$_GET['id']]);
    $gen = $stmt->fetchAll();
    
    $stmt = $db->prepare(
        'SELECT imdb_language.lan_name 
        FROM imdb_movie_has_language 
        LEFT OUTER JOIN imdb_language ON imdb_movie_has_language.imdb_language_id=imdb_language.id
        WHERE imdb_movie_id=?;');
    $stmt ->execute([$_GET['id']]);
    $lan = $stmt->fetchAll();

    $stmt = $db->prepare(
        'SELECT imdb_movie_origin_country.oc_name 
        FROM imdb_movie_has_origin_country 
        LEFT OUTER JOIN imdb_movie_origin_country ON imdb_movie_has_origin_country.imdb_movie_origin_country_id=imdb_movie_origin_country.id
        WHERE imdb_movie_id=?;');
    $stmt ->execute([$_GET['id']]);
    $cou = $stmt->fetchAll();
    ?>
    <h1>Movies</h1>
    <div>
        <p>Type:<?php echo $mov['type_name']?></p>
        <p>Status:<?php echo $mov['status_name']?></p>
        <p>Name:<?php echo $mov['name']?></p>
        <p>length:<?php echo $mov['length']?></p>
        <p>Year:<?php echo $mov['year']?></p>
        <p>Start year:<?php echo $mov['start_year']?></p>
        <p>End year:<?php echo $mov['end_year']?></p>
        <p>Rating:<?php echo $mov['rating']?></p>
        <p>Votes:<?php echo $mov['votes_nr']?></p>
        <p>Metascore:<?php echo $mov['metascore']?></p>
        <p>Certification:<?php echo $mov['label']?></p>                  
    </div>

<h2>Cast:</h2>
<ul>
    <?php foreach($per as $ind):?>
        <?php if($ind['imdb_position_id']==254){echo '<li>'.$ind['fullname'].'</li>';}?>
        <?php if($ind['imdb_position_id']==255){$dir[]=$ind['fullname'];}?>    
        <?php if($ind['imdb_position_id']==256){$wri[]=$ind['fullname'];}?>    
        <?php if($ind['imdb_position_id']==257){$pro[]=$ind['fullname'];}?>    
        <?php if($ind['imdb_position_id']==258){$com[]=$ind['fullname'];}?>    
        <?php if($ind['imdb_position_id']==259){$cin[]=$ind['fullname'];}?>    
    <?php endforeach;?>
</ul>
<h2>Direction:</h2>
<h3>Directors:</h3>
<ul>
    <?php foreach($dir as $ind):?>
        <?php echo $ind;?>    
    <?php endforeach;?>
</ul>
<h3>Writters:</h3>
<ul>
    <?php foreach($dir as $ind):?>
        <?php echo $ind;?>    
    <?php endforeach;?>
</ul>
<h3>Producers:</h3>
<ul>
    <?php foreach($dir as $ind):?>
        <?php echo $ind;?>    
    <?php endforeach;?>
</ul>
<h3>Composers:</h3>
<ul>
    <?php foreach($dir as $ind):?>
        <?php echo $ind;?>    
    <?php endforeach;?>
</ul>
<h3>Cinematographers:</h3>
<ul>
    <?php foreach($dir as $ind):?>
        <?php echo $ind;?>    
    <?php endforeach;?>
</ul>
<h2>Genres:</h2>
<ul>
    <?php foreach($gen as $ind):?>
        <li><?php echo $ind['genre_name']?></li>
    <?php endforeach;?>
</ul>
<h2>Languages:</h2>
<ul>
    <?php foreach($lan as $ind):?>
        <li><?php echo $ind['lan_name']?></li>
    <?php endforeach;?>
</ul>
<h2>Countries:</h2>
<ul>
    <?php foreach($cou as $ind):?>
        <li><?php echo $ind['oc_name']?></li>
    <?php endforeach;?>
</ul>