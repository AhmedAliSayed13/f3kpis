// $( ".list-inline" ).mouseout(function() {
//     $( "#profile-menu" ).removeClass('d-block');
// });
const toggleClassOnClick = (button, element) => {
    if (element) {
        button.addEventListener('click', () => {
            element.classList.toggle('d-block')
        });
    }
};


toggleClassOnClick(document.getElementById('profile-icon'), document.getElementById('profile-menu'));

toggleClassOnClick(document.getElementById('right-menu-button'), document.getElementById('right-menu'));

let toggleCardBodyButton = document.getElementsByClassName('toggle-body-button');
let cardBodies = document.getElementsByClassName('item-collapse');

for (let index = 0; index < toggleCardBodyButton.length; index++) {
    const element = toggleCardBodyButton[index];

    toggleClassOnClick(element, cardBodies[index]);
        element.addEventListener('click', function() {
            // element.innerHTML = element.innerHTML == '<i class="fas fa-minus"></i>' ?
            // '<i class="fas fa-plus"></i>':
            //     '<i class="fas fa-minus"></i>';
        })
}
$('.toggle-body-button').click(function(){
   $str=$(this).html();
   $search='minus';
   if($str.indexOf($search) > -1){
    $(this).empty();
    $str=$(this).html('<i class="fas fa-plus"></i>');
    }else{
        $(this).empty();
        $str=$(this).html('<i class="fas fa-minus"></i>');
    }
});


// handle change password page
let profilePage = document.getElementsByClassName('profile-page')[0];

if (profilePage) {
    let url = window.location.hash;

    if (url === '#change-password') {
        document.getElementById('pills-0-tab').classList.remove('active');
        document.getElementById('pills-0').classList.remove('show', 'active')

        document.getElementById('pills-1-tab').classList.add('active');
        document.getElementById('pills-1').classList.add('show', 'active')
    }

}


let uploadBtn = document.getElementById('upload-btn');

if (uploadBtn) {
    uploadBtn.addEventListener('click', function() {
        document.getElementById('image').click();
    });
}

// Owl Carousel Customization
var owl = $('.owl-carousel');

owl.owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1200: {
            items: 2
        },
        1400: {
            items: 3
        }
    }
})

$("#right-nav-button").click(function() {
    owl.trigger('prev.owl.carousel');
});

$("#left-nav-button").click(function() {
    owl.trigger('next.owl.carousel');
});

// Make body scroll in x when table exists and screen is less than 600px
let table = document.getElementsByTagName('table');

if (table.length > 0 && window.innerWidth < 600) {
    document.body.style.overflowX = 'scroll';
}