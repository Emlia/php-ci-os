<?php

defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");

function eee($ret, $data = null)
{
    echo json_encode(array("ret" => $ret, "data" => $data), JSON_UNESCAPED_UNICODE);
}


function adminAuthority()
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
            $this->adminAuthority();
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

    public function updateQuestion()
    {
        try {
            $this->adminAuthority();
            $qid = $this->input->post('qid', true);
            $type = $this->input->post('type', true);
            $tag = $this->input->post('tag', true);
            $chapter = $this->input->post('chapter', true);
            $text = $this->input->post('text', true);
            $src = $this->input->post('src', true);
            $options = $this->input->post('options', true);
            $answer = $this->input->post('answer', true);
            $analysis = $this->input->post('analysis', true);
            $this->OsModel->updateQuestion($qid, $type, $tag, $chapter, $text, $src, $options, $answer, $analysis);
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

    public function getQuestionById()
    {
        try {
            $userid = $this->input->post('userid', true);
            $res = $this->OsModel->getAnswersById($userid);
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }
    }

    public function searchQuestion()
    {
        try {
            $search = $this->input->post('search', true);
            $res = $this->OsModel->searchQuestion($search);
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
        }
    }
    public function deleteQuestion()
    {
        try {
            $this->adminAuthority();
            $qid = $this->input->post('qid', true);
            $res = $this->OsModel->deleteQuestion($qid);
            eee("200", $res);

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
            $this->OsModel->addAnswer($userid, $content);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }
    }

    public function updateAnswer()
    {
        try {
            $this->userAuthority();
            $userid = $this->input->post('userid', true);
            $orderAnswer = $this->input->post('orderAnswer', true);
            $chapterAnswer = $this->input->post('chapterAnswer', true);
            $simulationAnswer = $this->input->post('simulationAnswer', true);
            $simulation = $this->input->post('simulation', true);
            $errorAnswer = $this->input->post('errorAnswer', true);
            $error = $this->input->post('error', true);
            $this->OsModel->updateAnswer($userid, $orderAnswer, $chapterAnswer, $simulationAnswer, $error,$simulation,$errorAnswer);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }
    }

    public function updateOrderAnswer()
    {
        try {
            $userid = $this->input->post('userid', true);
            $orderAnswer = $this->input->post('orderAnswer', true);
            $this->OsModel->updateOrderAnswer($userid, $orderAnswer);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }
    }

    public function updateChapterAnswer()
    {
        try {
            $userid = $this->input->post('userid', true);
            $chapterAnswer = $this->input->post('chapterAnswer', true);
            $this->OsModel->updateChapterAnswer($userid, $chapterAnswer);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }
    }

    public function updateSimulationAnswer()
    {
        try {
            $userid = $this->input->post('userid', true);
            $simulationAnswer = $this->input->post('simulationAnswer', true);
            $this->OsModel->updateSimulationAnswer($userid, $simulationAnswer);
            eee('200', 'add success');

        } catch (Exception $e) {
            eee('400', $e);
        }
    }

    public function getAnswersById()
    {
        try {
            $userid = $this->input->post('userid', true);
            $res = $this->OsModel->getAnswersById($userid);
            eee("200", $res);

        } catch (Exception $e) {
            eee("400", $e);
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
            $id = $res[0]->id;
            $appkey = md5(uniqid(microtime(true), true));
            $this->OsModel->updateUser($id, $username, $password, $appkey);
            eee("200", array("id" => $id, "username" => $username, "appkey" => $appkey));
        } else {
            eee("500", $res);
        }
    }

    public function register()
    {
        try {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $appkey = md5(uniqid(microtime(true), true));
            $flag = $this->OsModel->getUserByName($username);
            if (count($flag) != 0) {
                eee("300", '已有该用户');
                die();
            }
            $res = $this->OsModel->register($username, $password, $appkey);
            eee('200', $flag);
        } catch (Exception $e) {
            eee("400", $e);
        }

    }

    public function forgetPassword()
    {
        try {
            $username = $this->input->post('username', true);
            $oldPassword = $this->input->post('oldPassword', true);
            $newPassword = $this->input->post('newPassword', true);
            $user = $this->OsModel->getUserByName($username);

            if (count($user) == 1 && $user[0]->password == $oldPassword) {
                $id = $user[0]->id;
                $appkey = md5(uniqid(microtime(true), true));
                $res = $this->OsModel->updateUser($id, $username, $newPassword, $appkey);
                eee('200', $res);
            } else {
                eee("300", '密码输入错误');
            }
        } catch (Exception $e) {
            eee("400", $e);
        }

    }

    public function searchUser()
    {
        try {
            $this->adminAuthority();
            $username = $this->input->post('username', true);
            $res = $this->OsModel->searchUser($username);
            eee('200', $res);

        } catch (Exception $e) {
            eee("400", $e);
        }

    }

    public function resetPassword()
    {

        try {
            $this->adminAuthority();
            $nid = $this->input->post('nid', true);
            $newPassword = $this->input->post('newPassword', true);
            $user = $this->OsModel->getUserById($nid);
            if (count($user) == 1) {
                $username = $user[0]->username;
                $appkey = md5(uniqid(microtime(true), true));
                $res = $this->OsModel->updateUser($nid, $username, $newPassword, $appkey);
                eee('200', $res);
            } else {
                eee('300', 'error');
            }


        } catch (Exception $e) {
            eee("400", $e);
        }
    }

    public function loginAuthority()
    {
        $this->userAuthority();
        eee('200', '用户验证成功');
    }

    private function userAuthority()
    {
        try {
            $id = $this->input->post('id', true);
            $appkey = $this->input->post('appkey', true);
            $username = $this->input->post('username', true);
            $user = $this->OsModel->getUserById_Username_Appkey($id, $username, $appkey);
            if (count($user) == 1) {
//                return;
            } else {
                eee('300', '用户验证失败');
                die();
            }

        } catch (Exception $e) {
            eee("400", $e);
            die();
        }
    }

    private function adminAuthority()
    {
        try {
            $id = $this->input->post('id', true);
            $appkey = $this->input->post('appkey', true);
            $user = $this->OsModel->getUserById_Username_Appkey($id, "admin", $appkey);
            if (count($user) == 1) {
            } else {
                eee('300', '用户验证失败');
                die();
            }
        } catch (Exception $e) {
            eee("400", $e);
            die();
        }
    }

    // user end
    // configuration start
    public function updateConfiguration()
    {

        try {
            $this->adminAuthority();
            // only one configuration
            $id = 999;
            $notice = $this->input->post('notice', true);
            $res = $this->OsModel->updateConfiguration($id, $notice);
            eee('200', $res);

        } catch (Exception $e) {
            eee("400", $e);
        }
    }

    public function getConfiguration()
    {

        try {
            $res = $this->OsModel->getConfiguration();
            eee('200', $res);

        } catch (Exception $e) {
            eee("400", $e);
        }
    }
    // configuration end
}
