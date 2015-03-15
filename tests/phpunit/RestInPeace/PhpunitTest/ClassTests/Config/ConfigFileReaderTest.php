<?php
namespace RestInPeace\PhpunitTest\ClassTests\Config;

use RestInPeace\Config\ConfigFileReader;
use PHPUnit_Framework_TestCase as TestCase;

class ConfigFileReaderTest extends TestCase
{
    public function testBasicFileInclusion()
    {
        // ARRANGE
        $configFileReader = new ConfigFileReader();

        $expectedResult = array('message' => 'hello world');

        // ACT
        $result = $configFileReader->read(RESTINPEACE_TEST_DIR . '/fixtures/config_files/general_config/simple_config_file.php');

        // ASSERT
        $this->assertEquals($expectedResult, $result);
    }
}
