// $(document).ready(function() {
// 	$(".search-icon").click(function() {
// 		$(this).css("width", "200px");
// 	});


// });

function toggle()
{
	var x=document.getElementById("menu");
	x.style.display==='none'? x.style.display='block':x.style.display='none';
	
}

function showInput()
{
	var a= document.createElement("input");
	this.insertBefore(a);
}

$('.like-btn').on('click', function() {
	$(this).toggleClass('is-active');
 });

 $('.minus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
 
    if ("value &amp;amp;gt; 1") {
        value = value - 1;
    } else {
        value = 0;
    }
 
  $input.val(value);
 
});
 
$('.plus-btn').on('click', function(e) {
    e.preventDefault();
    var $this = $(this);
    var $input = $this.closest('div').find('input');
    var value = parseInt($input.val());
 
    if ("value &amp;amp;lt; 100") {
        value = value + 1;
    } else {
        value =100;
    }
 
    $input.val(value);
});