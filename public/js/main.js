$('#modal-open').on("click", function() {
	$('#modal-m').addClass("active");
	$('#mask').addClass("active");
});

$('#modal-close').on("click", function() {
	$('#modal-m').removeClass("active");
	$('#mask').removeClass("active");
});

const onMouseenter = (e) => {
  // マウスが乗った時の処理
  $(e.target).css({
    'background-color': '#ffdbb7',
  });
};
const onMouseleave = (e) => {
  // マウスが外れた時の処理
  $(e.target).css({
    'background-color': '#ffe5cc',
  });
};

$('.menu a')
  .on('mouseenter', onMouseenter)
  .on('mouseleave', onMouseleave);