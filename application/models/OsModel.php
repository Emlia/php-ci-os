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
    public function addQuestion($chapter, $content)
    {

        $insert_data = array(
            'chapter' => $chapter,
            'content' => $content
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
}