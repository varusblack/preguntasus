<?

$nombre= $_SERVER["DOCUMENT_ROOT"]. '/abd/fotosPerfil/'.$_GET["id"].'.jpg';
$tam = $_GET["tam"];

$datos = getimagesize($nombre);

$anchura = $tam;
$hmax = intval($tam * 3 / 4);

$ratio = $datos[0] / $anchura;
$altura = intval(($datos[1] / $ratio));
if ($altura > $hmax) {
    $anchura2 = intval($hmax * $anchura / $altura);
    $altura = $hmax;
    $anchura = $anchura2;
}
$thumb = imagecreatetruecolor($anchura, $altura);
$img = imagecreatefromjpeg($nombre);
imagecopyresampled($thumb, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);
if ($datos[2] == 2) {
    header("Content-type: image/jpeg");
    imagejpeg($thumb);
}

imagedestroy($thumb);
imagedestroy($img);
?>
