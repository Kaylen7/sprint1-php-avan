<?php
session_start();

$stylesheet='./css/styles.css';
include('./src/head.php')

?>

<body>
<h1>Formulari molt important</h1>

<?php include('./src/e1.php'); ?>

<section>
<h2>Exercici 2</h2>
<?php include('./src/e2.php'); ?>

<hr>
<h2>Exercici 3</h2>
<?php include('./src/e3.php'); ?>

</section>
</body>
</html>