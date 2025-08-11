<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['MBlog']);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
    }

    public function form($id = 0) {
        $data['title'] = 'Thêm mới blog';
        $data['text_button'] = 'Lưu';
        $data['content'] = '/admin/pages/template/form';
        $data['id'] = $id;
        $blog = $this->input->post("dataForm");
        $dataError = [];
        if(!empty($blog)) {
            if(empty($blog['title'])) {
                $dataError['title'] = 'Tiêu đề không được để trống';
            } else {
                $checkExist = $this->MBlog->getOneBy(['title' => $blog['title']]);
                if($checkExist && $checkExist->id != $id) {
                    $dataError['title'] = 'Tiêu đề đã tồn tại';
                }
            }
            if($this->input->post("image_url")) {
                $base64Image = $this->input->post("image_url");
                // Tách định dạng và dữ liệu
                list($type, $dataImage) = explode(';', $base64Image);
                list(, $dataImage) = explode(',', $dataImage);

                $dataImage = base64_decode($dataImage);
                // Xác định phần mở rộng ảnh từ định dạng MIME
                $ext = '';
                if (strpos($type, 'image/jpeg') !== false) {
                    $ext = 'jpg';
                } elseif (strpos($type, 'image/png') !== false) {
                    $ext = 'png';
                } elseif (strpos($type, 'image/gif') !== false) {
                    $ext = 'gif';
                } 
                $filename = uniqid() . '.' . $ext;
                $filepath = 'assets/uploads/' . $filename;  // Đảm bảo thư mục 'writable/uploads/' tồn tại
                file_put_contents($filepath, $dataImage);
                $blog['image_url'] = $filepath;
                if($this->input->post("image_old")) {
                    if(file_exists($this->input->post("image_old"))) {
                        unlink($this->input->post("image_old"));
                    }
                }
            }
            if(empty($dataError)) {
                $blog['slug'] = createSlug($blog['title']);
                if($id == 0) {
                    $blog['created_at'] = date('Y-m-d H:i:s');
                }
                $blog['updated_at'] = date('Y-m-d H:i:s');
                try {
                    if($id > 0) {
                        $this->MBlog->update($id, $blog);
                    } else {
                        $this->MBlog->insert($blog);
                    }
                    redirect('/admin/blog');
                } catch(Exception $ex) {
                echo $ex;
                die;
                }
            }
        }
        $data["dataForm"] = $blog;
        if(!empty($dataError)) {
            $data["dataForm"] = $blog;
            $data["dataError"] = $dataError;
        } else {
            if($id > 0) {
                $data['title'] = 'Sửa blog';
                $blog= $this->MBlog->getOneByID($id);
                $data["dataForm"] = $blog;
            } 
        }
        $data['forms'] = $this->getForm($data["dataForm"]);
        $this->load->view('admin/layouts/app', $data);
    }

    public function delete($id) {
        // is_admin();
        try {
            $this->MBlog->delete($id);
            redirect('/admin/blog');
        } catch(\Exception $ex) {
            echo json_encode(["success" => false, "message" => "Xóa thất bại"]);
        }
    }

    public function index() {
        // is_admin();
        $data['title'] = "Danh sách blog";
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = $this->MBlog->count_all(['search' => $search]); // tổng số mục
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $blogs = $this->MBlog->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
        $previousPageUrl = $page > 1 ? pageUrl($page - 1) : null;
        $nextPageUrl = $page < $totalPage ? pageUrl($page + 1) : null;

        // Tạo danh sách trang sẽ hiển thị
        $pagesToShow = [];

        if ($totalPage <= 5) {
            // Nếu <= 5 trang thì hiển thị hết
            for ($i = 1; $i <= $totalPage; $i++) {
                $pagesToShow[] = $i;
            }
        } else {
            // Luôn hiển thị trang 1
            $pagesToShow[] = 1;

            // Các trang ở giữa
            $start = max(2, $page - 1);
            $end = min($totalPage - 1, $page + 1);

            if ($start > 2) {
                $pagesToShow[] = '...';
            }

            for ($i = $start; $i <= $end; $i++) {
                $pagesToShow[] = $i;
            }

            if ($end < $totalPage - 1) {
                $pagesToShow[] = '...';
            }
            // Luôn hiển thị trang cuối
            $pagesToShow[] = $totalPage;
        }
        $data['page_name'] = 'blog';
        $data['datas'] = $blogs;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['fields'] = $this->listField();
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        $data['content'] = '/admin/pages/template/index';
        $this->load->view('admin/layouts/app', $data);
    }

    public function listField() {
        return [
            [
                'key' => 'id',
                'name' => 'ID'
            ],
            [
                'key' => 'title',
                'name' => 'Tiêu đề'
            ],
            [
                'key' => 'slug',
                'name' => 'URL SEO'
            ],
            [
                'key' => 'image_url',
                'name' => 'Ảnh',
                'type' => 'image'
            ],
        ];
    }

    public function getForm($data) {
        return [
            [
                'title' => 'Tiêu đề',
                'field' => 'title',
                'value' => isset($data['title']) ? $data['title'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'URL SEO',
                'field' => 'slug',
                'value' => isset($data['slug']) ? $data['slug'] : '',
                'required' => false,
                'type' => 'text'
            ],
            [
                'title' => 'Ảnh',
                'field' => 'image_url',
                'value' => isset($data['image_url']) ? $data['image_url'] : '',
                'required' => true,
                'type' => 'file'
            ],
            [
                'title' => 'Nội dung',
                'field' => 'description',
                'value' => isset($data['description']) ? $data['description'] : '',
                'required' => true,
                'type' => 'textarea'
            ]
        ];
    }

    public function getblog() {
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $category_id =  $this->input->get('category_id') ? $this->input->get('category_id') : 0; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 20; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = 0;
        if($category_id > 0)  {
            $total = $this->MBlogCategory->count_blogs(['search' => $search, 'category_id' => $category_id]); // tổng số mục
        } else {
            $total = $this->MBlog->count_all(['search' => $search]); // tổng số mục
        }
       
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl2($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $blogs = [];
        if($category_id == 0)  {
            $blogs = $this->MBlog->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
        } else {
            $blogs = $this->MBlogCategory->get_blogs_with_categories(['limit' => $perPage, 'offset' => $offset, 'search' => $search, 'category_id' => $category_id]);
        }
        $previousPageUrl = $page > 1 ? pageUrl2($page - 1) : null;
        $nextPageUrl = $page < $totalPage ? pageUrl2($page + 1) : null;

        // Tạo danh sách trang sẽ hiển thị
        $pagesToShow = [];

        if ($totalPage <= 5) {
            // Nếu <= 5 trang thì hiển thị hết
            for ($i = 1; $i <= $totalPage; $i++) {
                $pagesToShow[] = $i;
            }
        } else {
            // Luôn hiển thị trang 1
            $pagesToShow[] = 1;

            // Các trang ở giữa
            $start = max(2, $page - 1);
            $end = min($totalPage - 1, $page + 1);

            if ($start > 2) {
                $pagesToShow[] = '...';
            }

            for ($i = $start; $i <= $end; $i++) {
                $pagesToShow[] = $i;
            }

            if ($end < $totalPage - 1) {
                $pagesToShow[] = '...';
            }
            // Luôn hiển thị trang cuối
            $pagesToShow[] = $totalPage;
        }
        $data['page_name'] = 'blog';
        $data['datas'] = $blogs;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['fields'] = $this->listField();
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        $this->load->view('front-end/ajax/show_blog', $data);
    }
}
