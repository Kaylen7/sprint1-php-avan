<?php
require __DIR__ . '/vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;

$converter = new CommonMarkConverter();
$main_text = "
# Exercici 1
## Amb League\CommonMark

Això és un exemple fet amb markdown.

![image](https://media.istockphoto.com/id/992637094/es/foto/gato-brit%C3%A1nico-de-pelo-corto-y-el-golden-retriever.webp?s=612x612&w=is&k=20&c=Q5o_kQClJ2N4RBBL_HlGKjRVEZadLQHbjudHYo2FSrA=)
";

echo $converter->convert($main_text)->getContent();