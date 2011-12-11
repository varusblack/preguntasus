<?php

class ElementoDAOImpl implements Dao, Iterator {
	private $conexion;
	private $resultados = array();
	private $numResultados;
	private $posicion;

	public function __construct() {
		$this -> conexion = new MySQL();
	}

	public function delete($elemento) {

	}

	public function encontrarElementosDeUsuario(Usuario $usuario) {

	}

	public function encontrarRespuestas(Elemento $elemento) {

	}

	public function getAll() {
		$consulta = "SELECT * FROM elemento";
		$resultado = $this -> conexion -> query($consulta);
		$this -> numResultados = $resultado -> num_rows;

		while ($registro = $resultado -> fetch_array(MYSQLI_ASSOC)) {
			$this -> resultados[] = $registro;
		}
		$this -> posicion = 0;
		$this -> atributos = $this -> resultados[$this -> posicion];

	}

	public function getById($id) {
		$consulta = "SELECT * FROM elemento WHERE id=$id";
		$resultado = $this -> conexion -> query($consulta);
		$this -> numResultados = $resultado -> num_rows;

		while ($registro = $resultado -> fetch_array(MYSQLI_ASSOC)) {
			$this -> resultados[] = $registro;
		}
		$this -> posicion = 0;
		$this -> atributos = $this -> resultados[$this -> posicion];

	}

	public function insert(Elemento $elemento) {

	}

	public function update(Elemento $elemento) {

	}

	public function current() {
		return $this;
	}

	public function key() {
		return $this -> posicion;
	}

	public function next() {
		$this -> posicion++;
	}

	public function rewind() {
		$this -> posicion = 0;
	}

	public function valid() {
		$ret = $this -> posicion < $this -> numResultados;
		if ($ret) {
			$this -> atributos = $this -> resultados[$this -> posicion];
		}
		return $ret;
	}

	public function getNumElementos() {
		return $this -> numResultados;
	}

}
?>