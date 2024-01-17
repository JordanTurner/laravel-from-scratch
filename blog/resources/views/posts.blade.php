<!doctype html>


<title>My Blog</title>

<link rel="stylesheet" href="app.css">

<body>

<?php foreach($posts AS $post) : ?>

    <article>

        <h1>
            <a href="posts/<?= $post->slug;?>"><?= $post->title; ?></a>
        </h1>

        <p><?= $post->excerpt; ?></p>

    </article>
   
<?php endforeach; ?>    

</body>