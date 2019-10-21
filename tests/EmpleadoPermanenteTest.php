<?php

require_once "EmpleadoTest.php";

class EmpleadoPermanenteTest extends EmpleadoTest {

  // Si el metodo calcular comision funciona bien, es porque calcularAntiguedad tambien.

  public function testFuncionamientoNormalFechaIngreso(){
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dt = new DateTime('03/10/2019');
    date_format($dt, 'Y-m-d');
    $ee = new \App\EmpleadoPermanente("Fernando", "Wabab", 12345678, 1000, $dt);
    $this->assertEquals($dt, $ee->getFechaIngreso());
  }

  public function testFuncionamientoNormalCalcularComision(){
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dt = new DateTime('03/10/2017');
    $ee = new \App\EmpleadoPermanente("Fernando", "Wabab", 12345678, 1000, $dt);
    $this->assertEquals("2%", $ee->calcularComision());
  }

  public function testFuncionamientoNormalCalcularIngresoTotal(){
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dt = new DateTime('03/10/2017');
    $ee = new \App\EmpleadoPermanente("Fernando", "Wabab", 12345678, 1000, $dt);
    $this->assertEquals(1020, $ee->calcularIngresoTotal());
  }

  public function testFuncionamientoNormalSinFechaDeEntrada(){
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dt = new DateTime(); // Problemas con los milisegundos
    //date_format($dt, 'Y-m-d H:i:sP');
    $ee = new \App\EmpleadoPermanente("Fernando", "Wabab", 12345678, 1000);
    $this->assertEquals(date_format($dt, 'Y-m-d'), date_format($ee->getFechaIngreso(), 'Y-m-d'));
    $this->assertEquals(0, $ee->calcularAntiguedad());
  }

  public function testProbandoEmpleadoConFechaDelFuturo(){
    $this->expectException(\Exception::class);
    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $dt = new DateTime('03/10/2050');
    $ee = new \App\EmpleadoPermanente("Fernando", "Wabab", 12345678, 1000, $dt);
  }

}//fin class
