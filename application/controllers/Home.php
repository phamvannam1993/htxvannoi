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
        $categories = $this->MCategory->get(['parent_id' => 0], 'ASC');
        for($i = 0; $i < count($categories); $i++) {
            $categories[$i]['items'] = $this->MCategory->get(['parent_id' => $categories[$i]['id']], 'ASC');
        }
        $this->categories = $categories;
        $this->setting = $this->MSetting->getOneBy();
        $this->blogs = $this->MBlog->get();
    }

    public function index(){
        $data['products'] = $this->MProduct->get(['limit' => 10, 'offset' => 0]);
        $data['sliders'] =  $this->sliders;
        $data['setting'] =  $this->setting;
        $data['categories'] = $this->categories;
        $caProducts = [];
        foreach($this->categories as $category) {
            $cateIds = [];
            if(count($caProducts) < 3) {
                $cateIds[] = $category['id'];
                if(!empty($category['items'])) {
                    foreach($category['items'] as $item) {
                        $cateIds[] = $item['id'];
                    }
                }
                $products = $this->MProduct->get(['limit' => 18, 'offset' => 0, 'category_ids' => $cateIds]);
                if(!empty($products)) {
                    $caProducts[] = [
                        'category' => $category,
                        'products' => $products
                    ];
                }
            }
        }
        $data['caProducts'] =  $caProducts;
        $data['blogs'] =  $this->blogs;
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
        $data['sliders'] =  $this->sliders;
        $data['setting'] =  $this->setting;
        $data['categories'] =  $this->categories;
        $category = $this->MCategory->getOneBy(['slug' => $slug]);
        if($slug == 'search') {
            $page = $this->input->get('page') ? $this->input->get('page') : 1; 
            $search = $this->input->get('query') ? $this->input->get('query') : ""; 
            $limit = $this->input->get('limit') ? $this->input->get('limit') : 12; // số mục mỗi trang
            $category_ids = [];
            $data['query'] = $search;
            $data = $this->getListProduct($data, $page, $limit, $category_ids, $search);
            $this->load->view('front-end/search_product', $data);
        } else if(!empty($category)) {
            $data['category'] = $category;
            $page = $this->input->get('page') ? $this->input->get('page') : 1; 
            $search = $this->input->get('search') ? $this->input->get('search') : ""; 
            $limit = $this->input->get('limit') ? $this->input->get('limit') : 12; // số mục mỗi trang
            $category_ids[] = $category->id;
            $cates = $this->MCategory->get(['parent_id' => $category->id], 'ASC');
            foreach($cates as $cate) {
                $category_ids[] =  $cate['id'];
            }
          
            $data = $this->getListProduct($data, $page, $limit, $category_ids, $search);
            $this->load->view('front-end/category_detail', $data);
        } else {
            $product = $this->MProduct->getOneBy(['slug' => $slug]);
            $category = $this->MCategory->getOneBy(['category_id' => $product->category_id]);
            $cates = $this->MCategory->get(['parent_id' => $category->id], 'ASC');
            $category_ids[] = $product->category_id;
            foreach($cates as $cate) {
                $category_ids[] =  $cate['id'];
            }
            if(!empty($product)) {
                $data['product'] = $product;
                $data['category'] = $category;
                $data['products'] = $this->MProduct->get(['limit' => 10, 'offset' => 0, 'not_pro_id' => $product->id, 'category_ids' => $category_ids]);
                $this->load->view('front-end/product_detail',$data);
            } else {
                $this->load->view('front-end/page_404',$data);
            }
        } 
    }

    public function getListProduct($data, $page, $limit, $category_ids = [], $search = "") {
        $total = $this->MProduct->count_all(['search' => $search, 'category_ids' => $category_ids]); 
        $perPage = $limit;
        $totalPage = ceil($total / $perPage);

        // Tính vị trí mục đầu và cuối trên trang hiện tại
        $firstItem = ($page - 1) * $perPage + 1;
        $lastItem = min($firstItem + $perPage - 1, $total);

        // Tạo URL phân trang
        function pageUrlProduct($p, $search) {
            return '?page=' . $p. '&query='.$search;
        }
        $offset = ($page - 1) * $perPage;
        $products = $this->MProduct->get(['limit' => $perPage, 'offset' => $offset, 'search' => $search, 'category_ids' => $category_ids]);
        $previousPageUrl = $page > 1 ? pageUrlProduct($page - 1, $search) : null;
        $nextPageUrl = $page < $totalPage ? pageUrlProduct($page + 1, $search) : null;

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
        $data['datas'] = $products;
        $data['lastItem'] = $lastItem;
        $data['page'] = $page;
        $data['pagesToShow'] = $pagesToShow; 
        $data['perPage'] = $perPage;
        $data['totalPage'] = $totalPage;
        $data['total'] = $total; 
        $data['firstItem'] = $firstItem;
        $data['nextPageUrl'] = $nextPageUrl;
        $data['previousPageUrl'] = $previousPageUrl;
        return $data;
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

    public function productDetail($slug) {
        $data['setting'] =  $this->setting;
        $data['sliders'] =  $this->sliders;
        $data['categories'] = $this->categories;
        $product = $this->MProduct->getOneBy(['slug' => $slug]);
        if(empty($product)) {
            return redirect('/');
        }
        $data['product'] =  $product;
        $data['products'] =  $this->MProduct->get(['category_id' => $product->category_id, 'no_pro_id' => $product->id]);
        $data['blogs'] =  $this->blogs;
        $this->load->view('front-end/product_detail',$data);
    }
    
}