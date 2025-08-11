<?php
error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');
class API extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model(['MAdmin', 'MFont', 'MCategory', 'MFontCategory']);
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->helper(['url', 'func_helper', 'images']);
        $this->load->library(['session', 'pagination311', 'upload']);
    }

    public function cloneFont() {
        $html = '<meta charset="UTF-8">'.file_get_contents('assets/html/file.html'); // hoặc HTML chuỗi

        libxml_use_internal_errors(true); // tránh cảnh báo DOM

        $dom = new DOMDocument();
        $dom->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new DOMXPath($dom);

        $items = $xpath->query('//div[contains(@class,"jet-listing-grid__item")]');

        $data = [];

        foreach ($items as $item) {
            // Lấy post ID
            $postId = $item->getAttribute('data-post-id');

            // Lấy ảnh + link
            $imgEl = $xpath->query('.//img', $item)->item(0);
            $imgSrc = $imgEl ? $imgEl->getAttribute('src') : '';
            $imgAlt = $imgEl ? $imgEl->getAttribute('alt') : '';

            // Lấy link bài viết
            $linkEl = $xpath->query('.//a', $item)->item(0);
            $link = $linkEl ? $linkEl->getAttribute('href') : '';
            $title = $linkEl ? trim($linkEl->textContent) : '';

            // Lấy các trường thông tin text
            $fields = $xpath->query('.//div[contains(@class,"jet-listing-dynamic-field__content")]', $item);
            $author = $vietHoa = $postedBy = '';

            foreach ($fields as $field) {
                $text = trim($field->textContent);
                if (strpos($text, 'Tác giả') !== false) $author = $text;
                if (strpos($text, 'Việt hóa') !== false) $vietHoa = $text;
                if (strpos($text, 'Đăng bởi') !== false) $postedBy = $text;
            }

            // Nút download
            $btn = $xpath->query('.//button[contains(@class,"open-popup-fc")]', $item)->item(0);
            $downloadLabel = $btn ? trim($btn->textContent) : '';

            // Gộp lại dữ liệu
            $data[] = [
                'post_id'     => $postId,
                'title'       => $title,
                'link'        => $link,
                'image'       => $imgSrc,
                'image_alt'   => $imgAlt,
                'author'      => $author,
                'viet_hoa'    => $vietHoa,
                'posted_by'   => $postedBy,
                'download'    => $downloadLabel,
            ];
            $filename = basename($imgSrc);
            $imageUrl = $this->uploadFileByUrl($imgSrc, $filename);
            $slug = createSlug($imgAlt);
            $dataSave = [
                'name' => $imgAlt,
                'post_id'     => $postId,
                'image_url' => $imageUrl,
                'slug' => $slug,
                'author' => str_replace("Tác giả:", "", $author),
                'vietnamization'    => str_replace("Việt hóa:", "", $vietHoa),
                'posted_by'   => str_replace("Đăng bởi:", "", $postedBy)
            ];
            $font = $this->MFont->getOneBy(['slug' => $dataSave['slug']]);
            if(!$font) {
                $this->MFont->insert($dataSave);
            } else {
                $this->MFont->update($font->id, ['post_id' => $postId]);
            }
        }
    }

    public function uploadFileByUrl($url, $name = '') {
        if(empty($url)) {
            return "";
        }
        $dataImage = file_get_contents($url); // Dùng @ để tránh warning

        if ($dataImage === false) {
            return false; // Tải thất bại
        }
    
        // Lấy đuôi file từ URL (jpg, png...)
        $ext = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        if (!$ext) $ext = 'jpg'; // fallback
        $filename = uniqid() . '.' . $ext;
        if($name) {
            $filename = $name;
        }
        $uploadDir = 'assets/uploads/fonts/';
        $filepath = $uploadDir . $filename;
    
        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
    
        file_put_contents($filepath, $dataImage);
    
        return $filepath; // hoặc return full URL nếu cần dùng bên ngoài
    }

    public function cloneDetailFont() {
        $fonts = $this->MFont->get(['limit' => 500, 'offset' => 0]);
        foreach($fonts as $item) {
            $url = "https://fontchuan.com/font/".$item['slug'];
            $linkDowload = $this->getLinkDownload($item['post_id']);
            if($linkDowload) {
               $this->MFont->update($item['id'], ['dowload_link' => $linkDowload]);
            }
            $response = file_get_contents($url, true);
            $resArr = explode('<div class="elementor-container elementor-column-gap-wide">', $response);
            $resArr2 = explode('</section>', $resArr[1]);
            $position_items = $resArr2[0];
            $html = $position_items;    
            libxml_use_internal_errors(true); // Bỏ lỗi HTML chưa chuẩn
    
            $doc = new DOMDocument();
            $doc->loadHTML('<?xml encoding="utf-8" ?>' . $html); // Thêm UTF-8 fix tiếng Việt
            $xpath = new DOMXPath($doc);
    
        
            $data = [
                'loai' => $this->getTermsFromXPath($xpath, 'Loại:'),
                'phu_hop_voi' => $this->getTermsFromXPath($xpath, 'Phù hợp với:'),
                'dung_trong_dip' => $this->getTermsFromXPath($xpath, 'Dùng trong dịp:')
            ];
            $this->MFont->update($item['id'], []);
            if(!empty($data['loai'])) {
                $this->updateInsertCategory($data['loai'], 1, $item['id']);
            }
            if(!empty($data['phu_hop_voi'])) {
                $this->updateInsertCategory($data['phu_hop_voi'], 2, $item['id']);
            }
            if(!empty($data['dung_trong_dip'])) {
                $this->updateInsertCategory($data['dung_trong_dip'], 3, $item['id']);
            }
        }
       
    }

      // Hàm lấy nội dung từ <a>
    function getTermsFromXPath($xpath, $label) {
        $query = "//span[contains(@class, 'elementor-post-info__item-prefix') and contains(text(), '$label')]/following-sibling::span[@class='elementor-post-info__terms-list']/a";
        $nodes = $xpath->query($query);
        $result = [];
        foreach ($nodes as $node) {
            $result[] = trim($node->nodeValue);
        }
        return $result;
    }

    public function updateInsertCategory($data, $type, $fontId) {
        foreach($data as $item) {
            $dateCa = [
                'name' => $item,
                'slug' => createSlug($item)
            ];
            $checkExist = $this->MCategory->getOneBy($dateCa);
            $cateId = 0;
            if($checkExist) {
                $cateId = $checkExist->id;
            } else {
                $cateId = $this->MCategory->insert($dateCa);
            }

            $dataFontCa = [
                'font_id' => $fontId,
                'category_id' => $cateId,
                'type_id' => $type
            ];
            $checkExist = $this->MFontCategory->getOneBy($dataFontCa);
            if(!$checkExist) {
                $this->MFontCategory->insert($dataFontCa);
            }
        }
    }

    public function getLinkDownload($id) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fontchuan.com/wp-admin/admin-ajax.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'action=load_popup_fc_content&post_id='.$id,
        CURLOPT_HTTPHEADER => array(
            'accept: */*',
            'accept-language: en-US,en;q=0.9,vi;q=0.8',
            'content-type: application/x-www-form-urlencoded; charset=UTF-8',
            'origin: https://fontchuan.com',
            'priority: u=1, i',
            'referer: https://fontchuan.com/font/',
            'sec-ch-ua: "Not)A;Brand";v="8", "Chromium";v="138", "Google Chrome";v="138"',
            'sec-ch-ua-mobile: ?0',
            'sec-ch-ua-platform: "macOS"',
            'sec-fetch-dest: empty',
            'sec-fetch-mode: cors',
            'sec-fetch-site: same-origin',
            'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
            'x-requested-with: XMLHttpRequest',
            'Cookie: _ga=GA1.1.2143901401.1747726457; _ga_3N0XSPMH2E=GS2.1.s1754206328$o14$g1$t1754208201$j60$l0$h0'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        $dom = new DOMDocument();
            libxml_use_internal_errors(true); // Tránh warning do HTML không chuẩn
            $dom->loadHTML($response);
            libxml_clear_errors();

            $xpath = new DOMXPath($dom);
            $link = $xpath->query('//div[@class="download-buttons-popup"]//a')->item(0);
            if ($link) {
                $downloadUrl = $link->getAttribute('href');
                return $downloadUrl;
            } else {
                return "";
            }
    }
}
