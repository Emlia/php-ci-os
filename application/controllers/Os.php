<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

function eee($ret, $data = null)
{
    echo json_encode(array("ret" => $ret, "data" => $data), JSON_UNESCAPED_UNICODE);
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

            $chapter = $this->input->post('chapter', true);
            $content = $this->input->post('content', true);
            $this->OsModel->addQuestion($chapter, $content);
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
}
