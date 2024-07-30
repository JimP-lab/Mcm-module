<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('email');
        $this->load->helper('url');
    }

    public function register() {
        $this->load->view('register');
    }

    public function register_user() {
        $email = $this->input->post('email');
        $verification_code = md5(rand());

        $user_data = array(
            'email' => $email,
            'verification_code' => $verification_code,
            'is_verified' => 0
        );

        $this->User_model->insert_user($user_data);

        $this->send_verification_email($email, $verification_code);
        echo "A verification email has been sent to your email address.";
    }

    private function send_verification_email($email, $verification_code) {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'your_email@gmail.com',
            'smtp_pass' => 'your_email_password',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );

        $this->email->initialize($config);

        $message = "
            <html>
            <head>
                <title>Verification Code</title>
            </head>
            <body>
                <h2>Thank you for Registering.</h2>
                <p>Your Account:</p>
                <p>Email: " . $email . "</p>
                <p>Please click the link below to activate your account.</p>
                <h4><a href='" . base_url() . "UserController/verify/" . $verification_code . "'>Activate My Account</a></h4>
            </body>
            </html>
        ";

        $this->email->set_newline("\r\n");
        $this->email->from('your_email@gmail.com', 'Your Name');
        $this->email->to($email);
        $this->email->subject('Signup Verification Email');
        $this->email->message($message);

        $this->email->send();
    }

    public function verify($verification_code) {
        $result = $this->User_model->verify_email($verification_code);

        if($result) {
            echo "Your email has been successfully verified!";
        } else {
            echo "Sorry! Unable to verify your email.";
        }
    }
}
?>
