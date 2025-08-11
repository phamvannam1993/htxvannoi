<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['MProduct', 'MCategory']);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
    }

    public function form($id = 0) {
        $data['title'] = 'Thêm mới sản phẩm';
        $data['text_button'] = 'Lưu';
        $data['content'] = '/admin/pages/template/form';
        $data['id'] = $id;
        $product = $this->input->post("dataForm");
        $dataError = [];
        if(!empty($product)) {
            if(empty($product['name'])) {
                $dataError['name'] = 'Tên sản phẩm không được để trống';
            } else {
                $checkExist = $this->MProduct->getOneBy(['name' => $product['name']]);
                if($checkExist && $checkExist->id != $id) {
                    $dataError['name'] = 'Tên sản phẩm đã tồn tại';
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
                $product['image_url'] = $filepath;
                if($this->input->post("image_old")) {
                    if(file_exists($this->input->post("image_old"))) {
                        unlink($this->input->post("image_old"));
                    }
                }
            }
            if(empty($dataError)) {
                $product['slug'] = createSlug($product['name']);
                if($id == 0) {
                    $product['created_at'] = date('Y-m-d H:i:s');
                }
                $product['updated_at'] = date('Y-m-d H:i:s');
                try {
                    if($id > 0) {
                        $this->MProduct->update($id, $product);
                    } else {
                        $this->MProduct->insert($product);
                    }
                    redirect('/admin/product');
                } catch(Exception $ex) {
                echo $ex;
                die;
                }
            }
        }
        $data["dataForm"] = $product;
        if(!empty($dataError)) {
            $data["dataForm"] = $product;
            $data["dataError"] = $dataError;
        } else {
            if($id > 0) {
                $data['title'] = 'Sửa sản phẩm';
                $product= $this->MProduct->getOneByID($id);
                $data["dataForm"] = $product;
            } 
        }
        $data['forms'] = $this->getForm($data["dataForm"]);
        $this->load->view('admin/layouts/app', $data);
    }

    public function delete($id) {
        // is_admin();
        try {
            $this->MProduct->delete($id);
            redirect('/admin/product');
        } catch(\Exception $ex) {
            echo json_encode(["success" => false, "message" => "Xóa thất bại"]);
        }
    }

    public function index() {
        // is_admin();
        $data['title'] = "Danh sách sản phẩm";
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = $this->MProduct->count_all(['search' => $search]); // tổng số mục
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $products = $this->MProduct->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
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
        $data['page_name'] = 'product';
        $data['datas'] = $products;
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
        $items = $this->MCategory->get(['type' => [1,2]]);
        return [
            [
                'key' => 'id',
                'name' => 'ID'
            ],
            [
                'key' => 'name',
                'name' => 'Tên product'
            ],
            [
                'key' => 'slug',
                'name' => 'URL SEO'
            ],
            [
                'key' => 'price',
                'name' => 'Giá'
            ],
            [
                'key' => 'image_url',
                'name' => 'Ảnh',
                'type' => 'image'
            ],
            [
                'key' => 'category_id',
                'name' => 'Loại sản phẩm',
                'type' => 'option',
                'items' => $items
            ],
        ];
    }

    public function getForm($data) {
        $items = $this->MCategory->get(['types' => [1,2]]);
        return [
            [
                'title' => 'Tên sản phẩm',
                'field' => 'name',
                'value' => isset($data['name']) ? $data['name'] : '',
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
                'title' => 'Giá',
                'field' => 'price',
                'value' => isset($data['price']) ? $data['price'] : '',
                'required' => true,
                'type' => 'number'
            ],
            [
                'title' => 'Ảnh sản phẩm',
                'field' => 'image_url',
                'value' => isset($data['image_url']) ? $data['image_url'] : '',
                'required' => true,
                'type' => 'file'
            ],
            [
                'title' => 'Danh mục',
                'field' => 'category_id',
                'value' => isset($data['category_id']) ? $data['category_id'] : '',
                'required' => false,
                'items' => $items,
                'type' => 'option'
            ],
            [
                'title' => 'Mô tả',
                'field' => 'description',
                'value' => isset($data['description']) ? $data['description'] : '',
                'required' => false,
                'type' => 'text'
            ],
            [
                'title' => 'Nội dung sản phẩm',
                'field' => 'content',
                'value' => isset($data['content']) ? $data['content'] : '',
                'required' => false,
                'type' => 'textarea'
            ]
        ];
    }

    public function getproduct() {
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $category_id =  $this->input->get('category_id') ? $this->input->get('category_id') : 0; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 20; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = 0;
        if($category_id > 0)  {
            $total = $this->MProductCategory->count_products(['search' => $search, 'category_id' => $category_id]); // tổng số mục
        } else {
            $total = $this->MProduct->count_all(['search' => $search]); // tổng số mục
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
        $products = [];
        if($category_id == 0)  {
            $products = $this->MProduct->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
        } else {
            $products = $this->MProductCategory->get_products_with_categories(['limit' => $perPage, 'offset' => $offset, 'search' => $search, 'category_id' => $category_id]);
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
        $data['page_name'] = 'product';
        $data['datas'] = $products;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['fields'] = $this->listField();
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        $this->load->view('front-end/ajax/show_product', $data);
    }

    public function products(){
        $category_id = $this->input->get('category_id') ? $this->input->get('category_id') : 0; 
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = $this->MProduct->count_all(['search' => $search,  'category_id' => $category_id]); // tổng số mục
       
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);
        $offset = ($page - 1) * $perPage;
        $products = $this->MProduct->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search, 'category_id' => $category_id]);
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
        $data['page_name'] = 'font';
        $data['datas'] = $products;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['search'] = $search;
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $this->load->view('front-end/ajax/show_product',$data);
    }
}
