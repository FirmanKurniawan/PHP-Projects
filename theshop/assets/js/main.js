// buat slider
$(document).ready(function(){
    // buat dropdown
    $('ul.nav [data-dropdown]').click(function(){
        let _this = $(this);
        let attribute = _this.attr('data-dropdown');

        if (attribute == 'dropdown-kategori'){
            _this.closest('.kategori').toggleClass('marginTopToggle');
        }

        $('ul.dropdown.'+attribute).toggleClass('show');
        
    });

    // buat slider
    var slideIndex = 1;
    var countOfSlides = $('.content').length;
    var slidesWidth = $('.content').width();
    activatingBubble(1);
    $('.slide-nav.next').click(function(){
        if (slideIndex >= countOfSlides){
            slideIndex = 1;
        } else {
            slideIndex++;
        }
        doSlide();
        activatingBubble(slideIndex);   
    });

    $('.slide-nav.prev').click(function(){
        if (slideIndex <= 1){
            slideIndex = countOfSlides;
        } else {
            slideIndex--;
        }
        doSlide();
        activatingBubble(slideIndex);
        // alert(slideIndex);
    });

    $('.bubbles [data-slide-to]').click(function(){
        let _this = $(this);
        let bubbleIndex = _this.attr('data-slide-to');
        let slide = _this.closest('.slide');
        let slideInner = slide.find('.slide-inner');
        if (!_this.hasClass('active')){
            $('.bubbles [data-slide-to]').removeClass('active');
            _this.addClass('active');
            doSlideWithNum(bubbleIndex);
        }
    });

    setInterval(function automateSlide(){
        if (slideIndex >= countOfSlides){
            slideIndex = 1;
        } else {
            slideIndex++;
        }
        doSlideWithNum(slideIndex);
        activatingBubble(slideIndex);
    },3000);

    function populateBubbles(){
        for (i=0;i<=countOfSlides;i++){
            
        }
    }

    function doSlide(){
        let berapaPiksel = parseInt(-(slidesWidth * (slideIndex - 1)));
        $('.slider-inner .content').css({'left':berapaPiksel});
    }

    function doSlideWithNum(indx){
        let berapaPiksel = parseInt(-(slidesWidth * (indx - 1)));
        $('.slider-inner .content').css({'left':berapaPiksel});
    }

    function activatingBubble(indx){
        let bubbleClass = ".bubbles [data-slide-to="+indx+"]";
        $('.bubbles [data-slide-to]').removeClass('active');
        $(bubbleClass).addClass('active');
    }


    // buat admin sidebar
    $('.show-sidebar').click(function(e){
        e.preventDefault();
        $('aside.sidebar').animate({
            left: 0
        },320);
    });
    $('.close-sidebar').click(function(e){
        e.preventDefault();
        $('aside.sidebar').animate({
            left: -300
        },320);
    });
});