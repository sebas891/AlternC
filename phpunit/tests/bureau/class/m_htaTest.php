<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-03-13 at 15:55:58.
 */
class m_htaTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var m_hta
     */
    protected $object;

    const PATH_HTACCESS             = "/tmp/.htaccess";
    const PATH_HTPASSWD             = "/tmp/.htpasswd";
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        touch(self::PATH_HTACCESS);
        touch(self::PATH_HTPASSWD);
        $file_content = "AuthUserFile \"/tmp/.htpasswd\"\nAuthName \"Restricted area\"\nAuthType Basic\nrequire valid-user\n";
        file_put_contents(self::PATH_HTACCESS,$file_content);
        $this->object = new m_hta;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
        if(file_exists(self::PATH_HTACCESS)){
            unlink (self::PATH_HTACCESS);
        }
        if(file_exists(self::PATH_HTPASSWD)){
            unlink (self::PATH_HTPASSWD);
        }
    }

    /**
     * @covers m_hta::m_webaccess
     * @todo   Implement testM_webaccess().
     */
    public function testM_webaccess()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::alternc_password_policy
     * @todo   Implement testAlternc_password_policy().
     */
    public function testAlternc_password_policy()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::hook_menu
     * @todo   Implement testHook_menu().
     */
    public function testHook_menu()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::CreateDir
     * @todo   Implement testCreateDir().
     */
    public function testCreateDir()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::ListDir
     * @todo   Implement testListDir().
     */
    public function testListDir()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::is_protected
     * @todo   Implement testIs_protected().
     */
    public function testIs_protected()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::get_hta_detail
     * @todo   Implement testGet_hta_detail().
     */
    public function testGet_hta_detail()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::DelDir
     */
    public function testDelDir()
    {
        $result                             = $this->object->DelDir("/tmp",TRUE);
        $this->assertTrue($result);
        $this->assertFileNotExists(self::PATH_HTACCESS);
        $this->assertFileNotExists(self::PATH_HTPASSWD);
    }

    /**
     * @covers m_hta::DelDir
     */
    public function testDelDirNotEmpty()
    {
        file_put_contents(self::PATH_HTACCESS, "\nphpunit", FILE_APPEND);
        $result                             = $this->object->DelDir("/tmp",TRUE);
        $this->assertTrue($result);
        $this->assertFileExists(self::PATH_HTACCESS);
        $this->assertFileNotExists(self::PATH_HTPASSWD);
        $this->assertTrue("phpunit" == trim(file_get_contents(self::PATH_HTACCESS)));
    }

    /**
     * @covers m_hta::add_user
     * @todo   Implement testAdd_user().
     */
    public function testAdd_user()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::del_user
     * @todo   Implement testDel_user().
     */
    public function testDel_user()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::change_pass
     * @todo   Implement testChange_pass().
     */
    public function testChange_pass()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }

    /**
     * @covers m_hta::_reading_htaccess
     * @todo   Implement test_reading_htaccess().
     */
    public function test_reading_htaccess()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
          'This test has not been implemented yet.'
        );
    }
}
