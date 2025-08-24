<div class="aside-content">
    <div class="nav-category  navbar-toggleable-md" >
        <ul class="nav navbar-pills">
            <?php foreach($categories as $category) { ?>
                <?php if(!empty($category['items'])) {  ?>
                    <li class="nav-item">
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        <a title="<?=$category['name']?>" href="/<?=$category['slug']?>" class="nav-link"><?=$category['name']?></a>
                        <i class="fa fa-angle-down" ></i>
                        <ul class="dropdown-menu">
                            <?php foreach($category['items'] as $item) { ?>
                            <li class="nav-item">
                                <a title="<?=$item['name']?>" class="nav-link" href="/<?=$item['slug']?>"><?=$item['name']?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } else {?>
                    <li class="nav-item">
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        <a title="<?=$category['name']?>" class="nav-link" href="/<?=$category['slug']?>"><?=$category['name']?></a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>