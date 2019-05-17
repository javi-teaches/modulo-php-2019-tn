<?php
	require_once 'Persona.php';

	class Estudiante extends Persona {
		protected $cursada;
		protected $codigo;

		public function __construct($unNombre, $unApellido, $unCodigo, $unaCursada)
		{
			parent::__construct($unNombre, $unApellido);
			$this->codigo = $unCodigo;
			$this->cursada = $unaCursada;
		}

		public function setCursada($unaCursada)
		{
			$this->cursada = $unaCursada;
		}

		public function getCursada()
		{
			return $this->cursada;
		}

		public function saludar()
		{
			return "Hola, soy " . $this->getNombre();
		}
	}

	$delfi = new Estudiante('Delfi', 'Suarez', 23456, 'Fullstack');
	$delfi->setEmail('delfiok@gmail.com');
	$juan = new Estudiante('Juan', 'Perez', 23534, "Marketing");
	$juan->setEmail('juan@gmail.com');

	echo "<pre>";
	var_dump($delfi, $juan);
	echo "</pre>";

?>

<h3>
	Hola, me llamo
	<?php echo $delfi->getNombre(); ?>
	<?php echo $delfi->getApellido(); ?>
	estoy cursando
	<?php echo $delfi->getCursada(); ?>,
	escribime a <?php echo $delfi->getEmail(); ?>
</h3>

<h3>
	Hola, me llamo
	<?php echo $juan->getNombre(); ?>
	<?php echo $juan->getApellido(); ?>
	estoy cursando
	<?php echo $juan->getCursada(); ?>,
	escribime a <?php echo $juan->getEmail(); ?>
</h3>

<h4><?= $delfi->saludar(); ?></h4>
<h4><?= $juan->saludar(); ?></h4>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
