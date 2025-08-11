<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    protected $setting;
    protected $sliders;
    protected $categories;
    protected $blogs;
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(['MAdmin', 'MProduct', 'MSlider','MCategory', 'MBlog', 'MSetting']);
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->sliders = $this->MSlider->get();
        $this->categories = $this->MCategory->get();
        $this->setting = $this->MSetting->getOneBy();
        $this->blogs = $this->MBlog->get();
    }

    public function index(){
        $data['products'] = $this->MProduct->get(['limit' => 10, 'offset' => 0]);
        $data['sliders'] =  $this->sliders;
        $data['setting'] =  $this->setting;
        $data['categories'] =  $this->categories;
        $data['blogs'] =  $this->blogs;
        $cateProducts = [];
        foreach($this->categories as $category) {
            if($category['type'] == 2) {
                $products = $this->MProduct->get(['category_id' => $category['id'], 'limit' => 6, 'offset' => 0]);
                $cateProducts[] = [
                    'category' => $category,
                    'products' => $products
                ];
            }
        }
        $data['cateProducts'] = $cateProducts;
        $this->load->view('index',$data);
    }

    public function blog(){
        $page = $this->input->get('page') ? $this->input->get('page') : 1; 
        $perPage = $this->input->get('limit') ? $this->input->get('limit') : 10; // số mục mỗi trang
        $search = $this->input->get('search') ? $this->input->get('search') : ""; 
        $total = $this->MBlog->count_all(['search' => $search]); // tổng số mục
       
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrl2($p) {
            return '?page=' . $p;
        }
        $offset = ($page - 1) * $perPage;
        $blogs = $this->MBlog->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search]);
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
        $data['page_name'] = 'font';
        $data['datas'] = $blogs;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        $this->load->view('front-end/blog',$data);
    }

    public function detail($slug){
        $product = $this->MProduct->getOneBy(['slug' => $slug]);
        if($product) {
            $data['product'] = $product;
            $data['products'] = $this->MProduct->get(['limit' => 4, 'offset' => 0, 'not_pro_id' => $product->id]);
            $this->load->view('front-end/product_detail',$data);
        } else {
            $blog = $this->MBlog->getOneBy(['slug' => $slug]);
            $data['blog'] = $blog;
            if($blog) {
                $data['blogs'] = $this->MBlog->get(['limit' => 3, 'offset' => 0, 'not_blog_id' => $blog->id]);
                $this->load->view('front-end/blog_detail',$data);
            } else {
                redirect('/');
            } 
        }
    }

    public function categoryDetail($slug) {
        $data['setting'] =  $this->setting;
        $category = $this->MCategory->getOneBy(['slug' => $slug]);
        $data['sliders'] =  $this->sliders;
        $data['categories'] =  $this->categories;
        $data['blogs'] =  $this->blogs;
        if(empty($category)) {
            return redirect('/');
        }
        $data['category'] = $category;
        $this->load->view('front-end/category_detail',$data);
    }

    public function buyingGuide() {
        $data['setting'] =  $this->setting;
        $data['sliders'] =  $this->sliders;
        $data['categories'] =  $this->categories;
        $data['blogs'] =  $this->blogs;
        $cate = $this->MCategory->getOneBy(['slug' => 'huong-dan-mua-hang']);
        if(empty($cate)) {
            return redirect('/');
        }

        $data['cate'] =  $cate;
        $this->load->view('front-end/introduce',$data);
    }

    public function introduce() {
        $data['setting'] =  $this->setting;
        $data['sliders'] =  $this->sliders;
        $data['categories'] =  $this->categories;
        $data['blogs'] =  $this->blogs;
        $cate = $this->MCategory->getOneBy(['slug' => 'gioi-thieu']);
        if(empty($cate)) {
            return redirect('/');
        }
        $data['cate'] =  $cate;
        $this->load->view('front-end/introduce',$data);
    }

    public function blogDetail($slug) {
        $data['setting'] =  $this->setting;
        $data['sliders'] =  $this->sliders;
        $data['categories'] =  $this->categories;
        $blog = $this->MBlog->getOneBy(['slug' => $slug]);
        if(empty($blog)) {
            return redirect('/');
        }
        $data['blog'] =  $blog;
        $data['blogs'] =  $this->blogs;
        $this->load->view('front-end/blog_detail',$data);
    }
}