<?php
	
	require "EmpleadoTest.php";

	class EmpleadoEventualTest extends EmpleadoTest {


      public function testFuncionamientoNormalCalcularComision(){
		$montos = [2000,4000];
        $ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
        $this->assertEquals(150, $ee->calcularComision());
      }
	  
	  public function testFuncionamientoNormalCalcularIngresoTotal(){
		$montos = [2000,4000];
        $ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
        $this->assertEquals(1150, $ee->calcularIngresoTotal());
      }
	  
	  public function testNoSePuedeCrearEmpleadoConMontoNegativo(){
		$this->expectException(\Exception::class);
		$montos = [2000,-1000];
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
		
    }
	  
	  

  }//fin class



?>
