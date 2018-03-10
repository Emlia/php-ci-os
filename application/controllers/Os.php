<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

function eee($ret, $data = null)
{
    echo json_encode(array("ret" => $ret, "data" => $data), JSON_UNESCAPED_UNICODE);
}

function authorityManagement()
{

}

class Os extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('OsModel');

    }

    public function index()
    {
        echo "os";
    }

    //tag start
    public function addTag()
    {
        try {

            $label = $this->input->post('label', true);
            $value = $this->input->post('value', true);
            $this->OsModel->addTag($label, $value);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }


    }

    public function getTags()
    {
        try {
            $res = $this->OsModel->getTags();
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }


    }

    public function editTag()
    {
        try {
            $id = $this->input->post('id', true);
            $label = $this->input->post('label', true);
            $value = $this->input->post('value', true);
            $this->OsModel->editTag($id, $label, $value);

        } catch (Exception $e) {
            eee("400", $e);
        }

    }
    //tag end

    //question start
    public function addQuestion()
    {
        try {
            $type = $this->input->post('type', true);
            $tag = $this->input->post('tag', true);
            $chapter = $this->input->post('chapter', true);
            $text = $this->input->post('text', true);
            $src = $this->input->post('src', true);
            $options = $this->input->post('options', true);
            $answer = $this->input->post('answer', true);
            $analysis = $this->input->post('analysis', true);
            $this->OsModel->addQuestion($type, $tag, $chapter, $text, $src, $options, $answer, $analysis);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }


    }

    public function addQuestionTest()
    {
        try {
            $type = $this->input->post('type', true);
            $tag = $this->input->post('tag', true);
            $chapter = $this->input->post('chapter', true);
            $text = $this->input->post('text', true);
            $src = $this->input->post('src', true);
            $options = $this->input->post('options', true);
            $answer = $this->input->post('answer', true);
            $analysis = $this->input->post('analysis', true);
            $this->OsModel->addQuestion($type, $tag, $chapter, $text, $src, $options, $answer, $analysis);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }


    }

    public function getQuestions()
    {
        try {
            $res = $this->OsModel->getQuestions();
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }


    }

    public function editQuestion()
    {
        try {
            $id = $this->input->post('id', true);
            $chapter = $this->input->post('chapter', true);
            $content = $this->input->post('content', true);
            $this->OsModel->editQuestion($id, $chapter, $content);

        } catch (Exception $e) {
            eee("400", $e);
        }

    }
    // question end

    // chapter start
    public function addChapter()
    {
        try {

            $chapter = $this->input->post('chapter', true);
            $content = $this->input->post('content', true);
            $this->OsModel->addChapter($chapter, $content);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }


    }

    public function getChapters()
    {
        try {
            $res = $this->OsModel->getChapters();
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }


    }

    public function editChapter()
    {
        try {
            $id = $this->input->post('id', true);
            $chapter = $this->input->post('chapter', true);
            $content = $this->input->post('content', true);
            $this->OsModel->editChapter($id, $chapter, $content);

        } catch (Exception $e) {
            eee("400", $e);
        }

    }
    // chapter end
    // type start
    public function getTypes()
    {
        try {
            $res = $this->OsModel->getTypes();
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }


    }
    // type end
    // options start
    public function addOptions()
    {
        try {

            $value = $this->input->post('value', true);
            $label = $this->input->post('label', true);
            $res = $this->OsModel->addOptions($value, $label);
            eee('200', $res);

        } catch (Exception $e) {
            eee('400', $e);
        }


    }
    // options end
    // answer start
    public function addAnswer()
    {
        try {

            $userid = $this->input->post('userid', true);
            $content = $this->input->post('content', true);

//            $content = json_encode($content, JSON_UNESCAPED_UNICODE);
//            echo var_dump($content);
// 过滤
//            $content = addslashes($content);
            $this->OsModel->addAnswer($userid, $content);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }


    }

    public function getAnswers()
    {
        try {
            $res = $this->OsModel->getAnswers();
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }


    }
    // answer end

    // user start
    public function login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $res = $this->OsModel->login($username, $password);
        if (count($res)) {
            eee("200", $res);
        } else {
            authorityManagement();
            eee("500", $res);
        }
    }

    public function register()
    {
        try {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $appkey =  md5(uniqid(microtime(true),true));
            $res = $this->OsModel->register($username, $password,$appkey);
            eee('200', 'add success');
        } catch (Exception $e) {
            eee("400", $e);
        }

    }
    // user end
}
