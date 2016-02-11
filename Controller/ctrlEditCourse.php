<?php

	require '../Models/clsConx.php'; 
	$con=conectar();
	require '../Models/clseditCourse.php';
	if (isset($_POST['inicio'])) 
		{
			session_start();
			$_SESSION['usuario']=NULL;
			/*session_destroy();	*/
			header("Location:../");
			return;
		}
	if (isset($_POST['btnbuscar'])) 
		{
			$cedula=$_POST['cedula'];
			if (!validarMatricula(conectar(),$cedula)) 
			{
				$matri=BuscarMatricula(conectar(),$cedula);
			}
			else
			{
	header("Location:../Controller/ctrlEditCourse.php?Mensaje=Esta matrícula no existe");
	return;
			}
		} 	
	if (isset($_POST['aceptar'])) 
	{
		$codcurso=$_POST['codcurso'];
		$nombre=$_POST['nombre'];
		$horas=$_POST['horas'];
		$opcion=$_POST['opcion'];
		
		if ($opcion=="insert") 
			{
			   $con=conectar();
			   insertarCurso($con,$codcurso,$nombre,$horas);
			}
		elseif (validarCodigo($con,$codcurso)) 
		{	
			if ($opcion=='edit')
			{
			$con=conectar();
			actualizarCurso($con,$codcurso,$nombre,$horas);
			}
			else
			{
				$con=conectar();
				eliminarCurso($con,$codcurso);
			}
		}
		else
		{
		header("Location:../Controller/ctrlEditCourse.php?Mensaje=Este código no existe");
		}
	}
	else
	{	
		$cursos=getcursos($con);
		require '../Views/editCourse.php';
	}

 ?>