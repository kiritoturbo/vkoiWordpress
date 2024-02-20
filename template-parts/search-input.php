<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search search-form" method="get" id="search-form"  role="search"  >
    <div class="input-group mb-1">
        <input type="search" id="search-input" class="form-control search-field" value="<?php echo get_search_query(); ?>" name="s" placeholder="Nhập tên sản phẩm..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button type="submit" class="btn btn-email btn-outline-secondary search-submit" type="button" id="button-addon2"><i class="fas fa-search"></i></button>              
            <div id="search-results"></div>
        </div>
        </div>
</form>
<div id="overlaysearch" class="hidden"></div>


