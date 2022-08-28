$(function(){

    //header menu--------------------------------------------------------
$('header nav >ul').mouseenter(function(){
    $('ul.sub').slideDown(500)
})

$('header nav >ul').mouseleave(function(){
    $('ul.sub').stop().slideUp(500)
})

//slide---------------------------------------------------------------
//setInterval(function(){
//$('.slideWrap').animate({'margin-left':'-1200'},function(){
//    $('.slide:first').appendTo('.slideWrap')
//    $('.slideWrap').css({'margin-left':'0'})
//})
//},3000)

$('.slide:gt(0)').hide()
setInterval(function(){
    $('.slide:first').fadeOut(2000).next().fadeIn(2000)
    $('.slide:first').appendTo('.slidewrap')
},4000)


///popUpBox---------------------------------------------------------
$('.notice li:nth-child(1)').click(function(){
    $('.popupbox').show();
})

$('.popupbox button').click(function(){
    $('.popupbox').hide();
})

$(function(){
	$('#top').on('click',function(e){
		e.preventDefault();
		$('html,body').animate({scrollTop:0},500);
	});
});

})