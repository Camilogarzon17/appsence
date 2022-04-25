<?php
class blogController{
    private $model;

    public function __construct(){
        $this->model = new blogModel();
    }
    public function ins($blog_data = array()){
        return $this->model->ins($blog_data);
    }
    public function upd($blog_data = array()){
        return $this->model->upd($blog_data);
    }
    public function sel($blog_cod = ''){
        return $this->model->sel($blog_cod);
    }
    public function del($blog_cod = ''){
        return $this->model->del($blog_cod);
    }
    public function articleContent($blog_cod = ''){
        return $this->model->articleContent($blog_cod);
    }
    public function articleText($blog_cod = ''){
        return $this->model->articleText($blog_cod);
    }
    public function articlesUser($user_id = ''){
        return $this->model->articlesUser($user_id);
    }
}
