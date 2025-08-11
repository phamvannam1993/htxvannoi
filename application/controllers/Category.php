<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['MCategory']);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
    }

    public function form($id = 0) {
        $data['title'] = 'Thêm mới category';
        $data['text_button'] = 'Lưu';
        $data['content'] = '/admin/pages/template/form';
        $data['id'] = $id;
        $category = $this->input->post("dataForm");
        $dataError = [];
        if(!empty($category)) {
            if(empty($category['name'])) {
                $dataError['name'] = 'Tên danh mục được để trống';
            } else {
                $checkExist = $this->MCategory->getOneBy(['name' => $category['name']]);
                if($checkExist && $checkExist->id != $id) {
                    $dataError['name'] = 'Tên danh mục đã tồn tại';
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
                $category['image_url'] = $filepath;
                if($this->input->post("image_old")) {
                    if(file_exists($this->input->post("image_old"))) {
                        unlink($this->input->post("image_old"));
                    }
                }
            }
            if(empty($dataError)) {
                if(empty($category['slug'])) {
                    $category['slug'] = createSlug($category['name']);
                }
                if($id == 0) {
                    $category['created_at'] = date('Y-m-d H:i:s');
                }
                $category['updated_at'] = date('Y-m-d H:i:s');
                try {
                    if($id > 0) {
                        $this->MCategory->update($id, $category);
                    } else {
                        $this->MCategory->insert($category);
                    }
                    redirect('/admin/category');
                } catch(Exception $ex) {
                echo $ex;
                die;
                }
            }
        }
        $data["dataForm"] = $category;
        if(!empty($dataError)) {
            $data["dataForm"] = $category;
            $data["dataError"] = $dataError;
        } else {
            if($id > 0) {
                $data['title'] = 'Sửa danh mục';
                $category= $this->MCategory->getOneByID($id);
                $data["dataForm"] = $category;
            } 
        }
        $data['forms'] = $this->getForm($data["dataForm"]);
        $this->load->view('admin/layouts/app', $data);
    }

    public function delete($id) {
        // is_admin();
        try {
            $this->MCategory->delete($id);
            redirect('/admin/category');
        } catch(\Exception $ex) {
            echo json_encode(["success" => false, "message" => "Xóa thất bại"]);
        }
    }

    public function index() {
        // is_admin();
        $data['title'] = "Danh sách category";
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = $this->MCategory->count_all(['search' => $search]); // tổng số mục
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $categorys = $this->MCategory->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
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
        $data['page_name'] = 'category';
        $data['datas'] = $categorys;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['search'] = $search;
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
        $items = $this->MCategory->listType();
        return [
            [
                'key' => 'id',
                'name' => 'ID'
            ],
            [
                'key' => 'name',
                'name' => 'Tên danh mục'
            ],
            [
                'key' => 'slug',
                'name' => 'Url SEO'
            ],
            [
                'key' => 'type',
                'name' => 'Loại danh mục',
                'type' => 'option',
                'items' => $items
            ]
        ];
    }

    public function getForm($data) {
        $items = $this->MCategory->listType();
        return [
            [
                'title' => 'Tên danh mục',
                'field' => 'name',
                'value' => isset($data['name']) ? $data['name'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'URL SEO',
                'field' => 'slug',
                'value' => isset($data['slug']) ? $data['slug'] : '',
                'type' => 'text',
            ],
            [
                'title' => 'Loại danh mục',
                'field' => 'type',
                'value' => isset($data['type']) ? $data['type'] : '',
                'required' => true,
                'items' => $items,
                'type' => 'option',
            ],
            [
                'title' => 'Nội dung',
                'field' => 'content',
                'value' => isset($data['content']) ? $data['content'] : '',
                'type' => 'textarea',
            ]
        ];
    }
}
