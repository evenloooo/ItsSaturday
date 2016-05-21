<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum extends CI_Controller {

	public function index() {
		$json_data = file_get_contents('http://alpha.mixerbox.com/interviewForum.php?function=readPostList');
		$obj = json_decode($json_data);
		$data['post_list'] = $obj->content;
		$this->load->view('forum_index', $data);
	}
    public function article($post_id = '') {
        if(!$post_id) show_404();
        $json_data = file_get_contents('http://alpha.mixerbox.com/interviewForum.php?function=readPost&postId=' . $post_id);
        $obj = json_decode($json_data);
        // var_dump($obj);exit;
        if (!isset($obj->content)) show_404();
        $data['article_detail'] = $obj->content;
        $this->load->view('article', $data);
    }
}
