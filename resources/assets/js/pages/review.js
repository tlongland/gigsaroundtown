require('jquery-bar-rating');


module.exports = (function() {
    $('#art_rating').barrating({
        theme: 'bars-1to10'
    });

    $('#ven_rating').barrating({
        theme: 'bars-1to10'
    });

    $('#price_rating').barrating({
        theme: 'bars-1to10'
    });
});
