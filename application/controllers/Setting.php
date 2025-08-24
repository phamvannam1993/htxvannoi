<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Setting extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['MSetting', 'MCategory']);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
        if (!admin()) { 
            redirect('admin/login');
        }
    }

    public function form($id = 0) {
        $data['title'] = 'Cài đặt';
        $data['text_button'] = $id > 0 ? 'Cập nhật' : 'Lưu';
        $data['content'] = '/admin/pages/template/form';
        $data['id'] = $id;
        $setting = $this->input->post("dataForm");

        $dataError = [];
        if(!empty($setting)) {
            if($this->input->post("image_url")) {
                $base64Image = $this->input->post("image_url");
                // Tách định dạng và dữ liệu
                list($type, $data) = explode(';', $base64Image);
                list(, $data) = explode(',', $data);

                $data = base64_decode($data);

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
                file_put_contents($filepath, $data);
                $setting['logo'] = $filepath;
                if($this->input->post("image_old")) {
                    if(file_exists($this->input->post("image_old"))) {
                        unlink($this->input->post("image_old"));
                    }
                }
            }
            if(empty($dataError)) {
                if($id == 0) {
                    $setting['created_at'] = date('Y-m-d H:i:s');
                }
                $setting['updated_at'] = date('Y-m-d H:i:s');
                try {
                    $settingDetail = $this->MSetting->getOneBy();
                    if($settingDetail) {
                        $this->MSetting->update($settingDetail['id'], $setting);
                    } else {
                        $this->MSetting->insert($setting);
                    }
                    redirect('/admin/setting');
                } catch(Exception $ex) {
                   echo $ex;
                   die;
                }
            }
            
        } else {
            $setting = $this->MSetting->getOneBy();
        }
        $data["dataForm"] = $setting;
       
        if(!empty($dataError)) {
            $data["dataForm"] = $setting;
            $data["dataError"] = $dataError;
        } else {
            $data['title'] = 'Cài đặt';
            $setting = $this->MSetting->getOneBy();
            $data["dataForm"] = $setting;
        }
        $data['forms'] = $this->getForm($data["dataForm"]);
        $this->load->view('admin/layouts/app', $data);
    }

    public function delete($id) {
        // is_admin();  
        try {
            $this->MSetting->delete($id);
            redirect('/admin/setting');
        } catch(\Exception $ex) {
            echo json_encode(["success" => false, "message" => "Xóa thất bại"]);
        }
    }

    public function index() {
        // is_admin();
        $data['title'] = "Danh sách cài đặt";
       
        $total = $this->MSetting->count_all(); // tổng số mục
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $categories = $this->MSetting->get(['limit' => $perPage, 'offset' => $offset]);
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
        $data['page_name'] = 'setting';
        $data['datas'] = $categories;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['fields'] = $this->listField();
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        $data['content'] = '/admin/pages/settings/index';
        $this->load->view('admin/layouts/app', $data);
    }

    public function listField() {
        return [
            [
                'key' => 'id',
                'name' => 'ID',
                'type' => ''
            ],
            [
                'key' => 'logo',
                'name' => 'Ảnh logo',
                'type' => 'image'
            ],
            [
                'key' => 'phone_number_1',
                'name' => 'Số điện thoại 1',
                'type' => ''
            ],
            [
                'key' => 'phone_number_2',
                'name' => 'Số điện thoại 2',
                'type' => ''
            ],
            [
                'key' => 'email',
                'name' => 'Email',
                'type' => ''
            ],
            [
                'key' => 'email',
                'name' => 'Email',
                'type' => ''
            ],
            [
                'key' => 'phone_number',
                'name' => 'Số điện thoại',
                'type' => ''
            ],
        ];
    }

    public function getForm($data) {
        $items = $this->MCategory->get([]);
        return [
            [
                'title' => 'Ảnh Logo',
                'field' => 'logo',
                'value' => isset($data['logo']) ? $data['logo'] : '',
                'required' => true,
                'type' => 'file',
            ],
            [
                'title' => 'Tên công ty',
                'field' => 'company',
                'value' => isset($data['company']) ? $data['company'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'Tên công ty đầy đủ',
                'field' => 'company_info',
                'value' => isset($data['company_info']) ? $data['company_info'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'Số điện thoại',
                'field' => 'phone_number',
                'value' => isset($data['phone_number']) ? $data['phone_number'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'Địa chỉ',
                'field' => 'address',
                'value' => isset($data['address']) ? $data['address'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'Email',
                'field' => 'email',
                'value' => isset($data['email']) ? $data['email'] : '',
                'required' => true,
                'type' => 'text',
            ],
            [
                'title' => 'Link facebook',
                'field' => 'fb_link',
                'value' => isset($data['fb_link']) ? $data['fb_link'] : '',
                'required' => true,
                'type' => 'text',
            ],
        ];
    }
}
