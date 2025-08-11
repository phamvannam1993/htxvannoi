<div class="col-md-3">
    <p class="lead">Rau Vân Nội</p>
    <div class="list-group">
        <?php foreach($categories as $item) { if($item['type'] != 2) {?>
            <a href="<?=$item['type'] == 1 ? '/danh-muc' : ''?>/<?=$item['slug']?>" class="list-group-item"><?=$item['name']?></a>
        <?php }} ?>
    </div>
    <div class="panel panel-default hidden-xs">
        <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span> <b> Tin tức</b></div>
        <div class="panel-body">
            <div class="row">
            <div class="col-xs-12">
                <ul class="demo1">
                    <?php foreach($blogs as $item) {?>
                    <li class="news-item">
                        <table cellpadding="4">
                        <tr>
                            <td><img src="/<?=$item['image_url']?>" width="60" class="img-rounded" /></td>
                            <td><b ><?=$item['title']?></b>
                                <a href="/tin-tuc/<?=$item['slug']?>">Đọc tiếp...</a>
                            </td>
                        </tr>
                        </table>
                    </li>
                   <?php } ?>
                </ul>
            </div>
            </div>
        </div>
        <div class="panel-footer"> </div>
    </div>
    <script src="/assets/js/NewBox.js"></script>
    <script>
        $(function () {
            $(".demo1").bootstrapNews({
                newsPerPage: 5,
                autoplay: true,
                pauseOnHover: true,
                direction: 'up',
                newsTickerInterval: 3000,
                onToDo: function () {
                    //console.log(this);
                }
            });
        });
    </script>
    <style>
        ﻿.glyphicon
        {
        margin-right:4px !important; /*override*/
        }
        .pagination .glyphicon
        {
        margin-right:0px !important; /*override*/
        }
        .pagination a
        {
        color:#555;
        }
        .panel ul
        {
        padding:0px;
        margin:0px;
        list-style:none;
        }
        .news-item
        {
        padding:4px 4px;
        margin:0px;
        border-bottom:1px dotted #555; 
        }
    </style>
    <div class="panel panel-default hidden-xs">
        <div class="panel-heading"> <span class="glyphicon glyphicon-earphone"><b> Hotline</b></span></div>
        <div class="panel-body">
            <div class="row">
            <div class="col-xs-12">
                <i class="glyphicon glyphicon-phone"> 0981406479</i>
                <br /><br />
                <i class="glyphicon glyphicon-phone"> 0913886333</i>
            </div>
            </div>
        </div>
    </div>
    <style>
        .glyphicon.glyphicon-phone{
        font-size: 20px;
        color:red;
        }
        .glyphicon.glyphicon-earphone{
        color:red;
        font-size:25px;
        }
    </style>
    <div class="panel panel-default hidden-xs">
        <div class="panel-heading"> <span class="glyphicon glyphicon-hand-right"><b> Quảng cáo</b></span></div>
        <div class="panel-body">
            <div class="row">
            <div class="col-xs-12">
                Bao bì carton, thùng carton
                <a href="http://baobianphat.com" target="_blank" title="thùng carton, bao bì carton">
                <img width="100%" src="/assets/images/bao bi an phat.jpg" alt="thùng carton, bao bì carton"/>
                </a>
            </div>
            </div>
        </div>
    </div>
    <style>
        .glyphicon.glyphicon-hand-right {
        font-size: 20px;
        color: red;
        }
    </style>
    <div class="panel panel-default hidden-xs">
        <div class="panel-heading"> <span class="glyphicon glyphicon-list-alt"></span><b> Mục rao vặt</b></div>
        <div class="panel-body">
            <div class="row">
            <div class="col-xs-12" id="raovat">
                <ul class="raovat" id="bodyraovat">
                </ul>
            </div>
            </div>
        </div>
        <div class="panel-footer">
            <a href="#myModalraovat" data-toggle="modal" class="text-success" onclick="getdataAdd()">
            <i class="glyphicon glyphicon-plus"></i>
            Đăng tin
            </a>
        </div>
    </div>
    <!--Add tin-->
    <div class="modal fade" id="myModalraovat" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đăng tin rao vặt</h4>
            </div>
            <form role="form" id="ModalFormAdd">
                <div class="modal-body">
                    <div class="form-group">
                        <p>Tiêu đề</p>
                        <div>
                        <input type="text" id="tieude" name="tieude" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Nội dung</p>
                        <div>
                        <textarea id="noidung" name="noidung" class="form-control" required ></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Số điện thoại</p>
                        <div>
                        <input type="text" id="sdt" name="sdt" class="form-control" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script src="/assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>
    <script src="/assets/js/accept.js" type="text/javascript"></script>
    <script src="/assets/js/NewBox.js"></script>
    <script>
        $(document).ready(function () {
            getdataraovat();
        })
        //Lấy dữ liệu
        function getdataraovat()
        {
            $.ajax({
                type: "GET",
                url: '/Shared/getdatatinraovat',
                success: function (response) {
                    
                    //alert(response.Data[0].OrderId);
                    $("#raovatboddy").empty();
                    var rowData = "";
                    for (var i = 0; i < response.length; i++) {
                        var value = response[i].ngaydang;
                        var date = new Date(parseInt(value.replace("/Date(", "").replace(")/", ""), 10));
                        var dateok = date.toLocaleDateString();
                        rowData = rowData+ "<li class='news-item'>" +
                                "<table cellpadding='4'>" +
                                    "<tr>" +
                                        "<td>" +
                                            "<b>" + response[i].tieude+"(Đăng:"+dateok+")" + "</b><br>" +
                                            "<pclass='caption'>"+response[i].noidung + "</p><br>" +
                                            "<b text-danger>Liên hệ: "+response[i].sodienthoai+"</b><br>"+
                                        "</td>" +
                                    "</tr>" +
                                "</table>" +
                            "</li>"
                        $('#bodyraovat').append(rowData);
                    }
                    $(".raovat").bootstrapNews({
                        newsPerPage: 3,
                        autoplay: true,
                        pauseOnHover: true,
                        direction: 'up',
                        newsTickerInterval: 3000,
                        onToDo: function () {
                            //console.log(this);
                        }
                    });
                    //$('#raovat').append(uptop + rowData + ulbootom);
                }
            });
        }
        //Thêm tin rao vặt
        function addraovat()
        {
            var tieude = $("#tieude").val();
            var noidung = $("#noidung").val();
            var sodienthoai = $("#sdt").val();
            var formData = new FormData();
            //alert(files[0].name);
            formData.append("tieude", tieude);
            formData.append("noidung", noidung);
            formData.append("sdt", sodienthoai);
            //alert(sodienthoai);
            $.ajax({
                type: "POST",
                url: '/Shared/themtinraovat',
                data: formData,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#myModalraovat').modal("toggle");
                    alert("Rao vặt của bạn sẽ hiển thị sau khi được kiểm duyệt")
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("Status: " + textStatus); alert("Error: " + errorThrown);
                }
            })
        }
        //duyệt tin
        function activedeactive(MbID) {
            //alert(MbID);
            $.ajax({
                type: "GET",
                url: '/Administrator/activedeactive',
                data: "MemberID=" + MbID,
                success: function () {
                    //alert("e");
                    GetPageData("User", $.cookie("curenpageMember"));
                }
            });
        }
        // validate Thêm Banner
        $(function () {
            $('#ModalFormAdd').validate({
                errorClass: 'help-block', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function (error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function (e) {
        
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function (e) {
                    e.closest('.form-group').removeClass('has-success has-error');
                    e.closest('.help-block').remove();
                },
                rules: {
                    tieude:
                        {
                            required: true,
                            minlength: 4,
                            maxlength: 150
                        },
                    noidung:
                        {
                            required: true,
                            minlength: 15,
                            maxlength: 300
                        },
                    sdt: {
                        required: true,
                        number: true,
                        minlength: 6,
                        maxlength: 15
                    }
        
                },
                messages: {
                    tieude:
                        {
                            required: "Không được để trống tiêu đề",
                            minlength: "Ít nhất có 4 kí tự",
                            maxlength: "Quá dài"
                        },
                    noidung:
                        {
                            required: "Mời bạn điền nội dung",
                            minlength: "Ít nhất là 6 kí tự",
                            maxlength: "Quá dài"
                        },
                    sdt: {
                        required: "Mời bạn điền số điện thoại",
                        number: "Không đúng",
                        minlength: "Ít nhất là 6 kí tự",
                        maxlength: "Quá dài"
                    }
                },
                submitHandler: function (form) {
                    //code in here
                    addraovat();
                }
            });
        });
    </script>
    <style>
        ﻿.glyphicon {
        margin-right: 4px !important; /*override*/
        }
        .pagination .glyphicon {
        margin-right: 0px !important; /*override*/
        }
        .pagination a {
        color: #555;
        }
        .panel ul {
        padding: 0px;
        margin: 0px;
        list-style: none;
        }
        .news-item {
        padding: 4px 4px;
        margin: 0px;
        border-bottom: 1px dotted #555;
        }
    </style>
</div>