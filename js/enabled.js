  var $cod=$('#codcurso'),
  $hours=$('#hours'),
  $course=$('#namecourse'),
  $edit=$('#edit'),
  $delete=$('#delete'),
  $insert=$('#insert');

  function editar () {
    $cod.removeAttr("disabled");
    $hours.removeAttr("disabled");
    $course.removeAttr("disabled");
  }
  function eliminar () {
    $cod.removeAttr("disabled");
    $hours.attr("disabled", "disabled");
    $course.attr("disabled", "disabled");
  }
  function insertar () {
    $cod.attr("disabled", "disabled");
    $hours.removeAttr("disabled");
    $course.removeAttr("disabled");
  }
  $edit.click(editar);
  $delete.click(eliminar);
  $insert.click(insertar);