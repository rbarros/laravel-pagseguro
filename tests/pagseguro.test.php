<?php

//use PagSeguro\pgs as PagSeguro;

class PagSeguroTest extends PHPUnit_Framework_TestCase {

	/**
	 * Starts PagSeguro.
	 * 
	 * @return void
	 */
	public function setUp()
	{
		Bundle::start('pagseguro');
	}
	public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($class = 'PagSeguro'),
                'Class not found: '.$class
        );
    }

    public function testInstantiationWithoutArgumentsShouldWork(){
    	$instance = new PagSeguro();
        $this->assertInstanceOf('PagSeguro', $instance);
    }

    /**
     * @depends testInstantiationWithoutArgumentsShouldWork
     */
    public function testSetDefaultWithValidDataShouldWork()
    {	
    	$default = array(
    					 'email_cobranca'=>'seu_email_no@pagseguro.com.br'
    					,'tipo'            => 'CP'
      					,'moeda'           => 'BRL'
    				);
        $instance = new PagSeguro($default);
        $this->assertAttributeEquals($default, '_config', $instance, 'Attribute was not correctly set');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Item precisa ser um array.
     */
    public function testInstantiationAddWithoutArgumentsShouldWork(){
        $instance = new PagSeguro();
        $instance->adicionar();
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valor invalido passado para descricao.
     */
    public function testSetDescricaoWithInvalidDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>'',
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>"33"
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valor invalido passado para valor.
     */
    public function testSetValorWithInvalidDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>'',
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>"33"
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valor invalido passado para peso.
     */
    public function testSetPesoWithInvalidDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>'',
					   	"quantidade"=>1,
					   	"id"=>"33"
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valor invalido passado para quantidade.
     */
    public function testSetQuantidadeWithInvalidDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>'',
					   	"id"=>"33"
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valor invalido passado para id.
     */
    public function testSetIdWithInvalidDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>''
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O item adicionado precisa conter descricao.
     */
    public function testSetDescricaoWithNullDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>null,
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>'33'
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O item adicionado precisa conter valor.
     */
    public function testSetValorWithNullDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>null,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>'33'
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O item adicionado precisa conter quantidade.
     */
    public function testSetQuantidadeWithNullDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>null,
					   	"id"=>'33'
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage O item adicionado precisa conter id.
     */
    public function testSetIdWithNullDataShouldThrownAnException(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>null
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
    }

    /**
     * @depends testInstantiationWithoutArgumentsShouldWork
     */
    public function testSetItensWithValidDataShouldWork(){
        $itens = array(
        			array(
					   	"descricao"=>"Descrição do Produto",
					   	"valor"=>12.90,
					   	"peso"=>2,
					   	"quantidade"=>1,
					   	"id"=>"33"
					)
				);
        $instance = new PagSeguro();
        $instance->adicionar($itens);
        $this->assertAttributeEquals($itens, '_itens', $instance, 'Attribute was not correctly set');
    }


}