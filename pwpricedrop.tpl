{*
 generated by Prestaweb.ru from pwdeveloper module
*}
<div class="action-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="headline">акции</div>
                <div class="row">
                        {foreach $products as $product}
                            <div class="cat-item">
                                <div class="product-photo"><a href="#"><img src="images/pic06.jpg" alt=""></a></div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-6">
                                        <div class="name"><a href="#">{$product['name']}</a></div>
                                        {if $product['available_now'] eq 'In stoch'} <div class="presense yes">В наличии</div> {/if}
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-6">
                                        <div class="last-price">{$product['price']} рублей</div>
                                        <div class="price"><span>{$product['price'] - ($product['price'] * $product['quantity_discount'])}</span> руб.</div>
                                    </div>
                                </div>
                                <div class="prod-nav">
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-6">
                                        <a href="#" class="add-to-cart"><i class="ico"></i>в корзину</a>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-6 col-xs-6">
                                        <a href="#" class="buy-one-click">купить в 1 клик</a>
                                    </div>
                                </div>
                            </div>
                        {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>