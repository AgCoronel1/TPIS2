<?php

abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase {

    public function testFuncionamientoNormalGetNombreYApellido(){
      $ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 2000);
      $this->assertEquals("Fernando Wabab", $ee->getNombreApellido());
    }
    public function testFuncionamientoNormalGetDNI(){
		$montos = [2000,4000];
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
		$this->assertEquals(12345678, $ee->getDNI());
    }
    public function testFuncionamientoNormalGetSalario(){
		$montos = [2000,4000];
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
		$this->assertEquals(1000, $ee->getSalario());
    }
	public function testFuncionamientoNormalSet_GetSector(){
		$montos = [2000,4000];
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000, $montos);
		$ee->setSector('Ventas');
		$this->assertEquals('Ventas', $ee->getSector());
    }
	
	public function testFuncionamientoNormalToString(){
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000);
		$this->assertEquals("Fernando Wabab 12345678 1000", $ee->__toString());
    }
	
	public function testNoSePuedeCrearEmpleadoSinNombre(){
		$this->expectException(\Exception::class);
		$ee = new \App\EmpleadoEventual("", "Wabab", 12345678, 1000);
		
    }
	
	public function testNoSePuedeCrearEmpleadoSinApellido(){
		$this->expectException(\Exception::class);
		$ee = new \App\EmpleadoEventual("Fernando", "", 12345678, 1000);
		
    }
	
	public function testNoSePuedeCrearEmpleadoSinDni(){
		$this->expectException(\Exception::class);
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 0, 1000);
		
    }
	public function testNoSePuedeCrearEmpleadoSinSalario(){
		$this->expectException(\Exception::class);
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, null);
		
    }
	
	public function testNoSePuedeCrearEmpleadoDNInoNumerico(){
		$this->expectException(\Exception::class);
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", "jajadni", 1000);
		
		
    }
	
	public function testGetSectorDevuelveNoEspecificado(){
		
		$ee = new \App\EmpleadoEventual("Fernando", "Wabab", 12345678, 1000);
		
		$this->assertEquals('No especificado', $ee->getSector());
    }
	
	
	
	
	

} //fin class

?>
