<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 18-3-2
 * Time: 下午4:30
 */

class OsModel extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        $db = $this->load->database('osdb');

    }

    // tag start
    public function addTag($label, $value)
    {
        $insert_data = array(
            'label' => $label,
            'value' => $value
        );
        $this->db->insert("tag", $insert_data);
    }

    public function getTags()
    {
        $query = $this->db->get('tag');
        return $query->result_array();
    }

    public function editTag($id, $label, $value)
    {

    }
    // tag end

    // quesion strat
    public function addQuestion($type, $tag, $chapter, $text, $src, $options, $answer, $analysis)
    {

        $insert_data = array(
            "type" => $type, "tag" => $tag, "chapter" => $chapter,
            "text" => $text, "src" => $src, "options" => $options,
            "answer" => $answer, "analysis" => $analysis
        );
        $this->db->insert("question", $insert_data);
    }

    public function getQuestions()
    {
        $query = $this->db->get('question');
        return $query->result_array();
    }

    public function editQuestion()
    {

    }
    // quesion end

    // chapter start
    public function addChapter($chapter, $content)
    {

        $insert_data = array(
            'chapter' => $chapter,
            'content' => $content
        );
        $this->db->insert("question", $insert_data);
    }

    public function getChapters()
    {
        $query = $this->db->get('chapter');
        return $query->result_array();
    }

    public function editChapter()
    {

    }
    // chapter end
    // type start
    public function getTypes()
    {
        $query = $this->db->get('type');
        return $query->result_array();
    }
    // type end

    // options start
    public function addOptions($value, $label)
    {
        $insert_data = array(
            'value' => $value,
            'label' => $label
        );
//        $res = $this->db->insert("options", $insert_data);
        $res = $this->db->insert_id("options", $insert_data);
        return $res;
    }

    // options end
    // answer start
    public function addAnswer($userid, $content)
    {
        $insert_data = array(
            'userid' => $userid,
            'content' => $content
        );
        $res = $this->db->insert("answer", $insert_data);
    }

    public function updateAnswer($userid, $orderAnswer, $chapterAnswer, $simulationAnswer, $error)
    {
        $data = array(
            'userid' => $userid,
            'orderAnswer' => $orderAnswer,
            'chapterAnswer' => $chapterAnswer,
            'simulationAnswer' => $simulationAnswer,
            'error' => $error
        );

        $this->db->replace('answer', $data);
    }

    public function updateOrderAnswer($userid, $orderAnswer)
    {
        $data = array(
            'userid' => $userid,
            'orderAnswer' => $orderAnswer
        );

        $this->db->replace('answer', $data);
    }

    public function updateChapterAnswer($userid, $chapterAnswer)
    {
        $data = array(
            'userid' => $userid,
            'chapterAnswer' => $chapterAnswer
        );

        $this->db->replace('answer', $data);
    }

    public function updateSimulationAnswer($userid, $simulationAnswer)
    {
        $data = array(
            'userid' => $userid,
            'simulationAnswer' => $simulationAnswer
        );

        $this->db->replace('answer', $data);
    }

    public function getAnswersById($userid)
    {
//        $query = $this->db->get('answer');
        $this->db->where('userid', $userid);
        $this->db->from('answer');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAnswers()
    {
        $query = $this->db->get('answer');
        return $query->result_array();
    }
    // answer end
    // user start
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->from('user');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function register($username, $password, $appkey)
    {
        $insert_data = array(
            'username' => $username,
            'password' => $password,
            'appkey' => $appkey
        );
        $res = $this->db->insert("user", $insert_data);
    }
    // user end
}