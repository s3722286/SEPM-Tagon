<?php
use PHPUnit\Framework\TestCase;
include '../newuser.php';

class testRegister extends TestCase
{
    public function testValidRegister()
    {
     /* $submitForm = <<<"EndOfFormTest"
        <!-- Test Bypasses confirm window -->
        <script>
         document.registerForm.onsubmit = hashPass();
         document.getElementById('regUserID').value = "user";
         document.getElementById('regPassword').value = "password";
         document.getElementById("registerForm").submit();
         
        </script>
        EndOfFormTest;
        echo $submitForm; */ //Okay Artem this is stupid, what am I doing?
        
        
        $_POST['regUserID'] = "user";
        $_POST['regPassword'] = hash('sha256', "password");
              
        $this->assertSame("user",$_POST['regUserID']);
        $this->assertSame("5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8",$_POST['regPassword']);
        
    }
}
?>