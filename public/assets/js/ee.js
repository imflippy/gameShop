//constanta koja sadrzi url adresu
const pageUrl = window.location.href;
const rootUrl = document.location.protocol +"//" + document.location.hostname + ":" +document.location.port;

function appentToUrl(stringUrl) {
    return rootUrl + stringUrl;
}

function responseOfRequest(data) {
    var errors = data.responseJSON;
    if (errors.errors){
        let firstMessageError = Object.values(errors.errors)[0];
        console.log(firstMessageError)
        swal(firstMessageError[0], '', 'error');
    }
}

$body = $("body");
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).on({


    ajaxStart: function() { $body.addClass("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); }
});

$('.deleteGame').click(function () {
    let idGame = $('.deleteGame').data('idgame');
    obrisiKorpu(idGame);

});

$(document).ready(function(){

    if(pageUrl.indexOf("games") != -1){
        getAllReviewsForOneGame();
    }
    numberOfWishes();

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)

    });


});

$('.addreview').click(addReview);

function addReview() {
    let ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    if (!ratingValue) {
        ratingValue = 0;
    }
    // console.log(ratingValue);
    let comment = $('#your-review').val();
    let idGame = $('#hiddenGame').val();

    console.log(ratingValue);
        $.ajax({
            url: appentToUrl('/api/addReview'),
            method: 'POST',
            data: {
                ratingValue: ratingValue,
                comment: comment,
                idGame: idGame
            },
            statusCode: {
                201: function () {
                    swal("Thank You!", "Your reviews has been posted", "success");
              },
                204: function () {
                    swal("Thank You!", "Your reviews has been updated", "success");
                },
                404: function () {
                    swal("You must login to achive review command", '', "error");
                },
                500: function () {
                    swal('We will fix this ASAP', '', "error");
                }
            },
            success: function () {
                getAllReviewsForOneGame();
                clearReview();
            },
            error: function (data) {
                responseOfRequest(data);
            }
        })
}

function getAllReviewsForOneGame() {
    let idGame = $('.addWish').data('idgame');
    $.ajax({
        url: appentToUrl('/api/getAllReviewsForOneGame'),
        method: 'GET',
        dataType: 'json',
        data: {
          idGame: idGame
        },
        success: function (data) {

            printReviews(data);
            calculateScore(data);
            console.log(data)
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}

function printReviews(data) {
    let html = '';
    data.forEach(d => {
       html += `
             <div class="sin-rattings">
                <div class="ratting-author">
                    <h3>${d.username}</h3>
                    <div class="ratting-star">
                        ${printStars(d.stars)}
                        <span>(${d.stars})</span>
                    </div>
                   ${showDeleteButtonForAdmin(d.id_comment)}
                </div>
                <p>${d.comment}</p>
            </div>
       `
    });

    $("#allReviews").html(html);
}

function printStars(stars) {
    let html = '';
    for (let i = 0; i < stars; i++) {
        html += '<i class="fa fa-star"></i>';
    }
    for (let i = 0; i < 5 - stars; i++) {
        html += '<i class="fa fa-star-o"></i>';
    }
    return html;
}

function calculateScore(data) {
    if (data.length){
        let sumStars = 0;
        data.forEach(d => {
            sumStars += d.stars;
        });

        $('#score').html(sumStars / data.length);
        $("#score-ratt").html(sumStars / data.length + " / 5 <i class='fa fa-star' style=\"position:absolute;\"></i>");
        $('#numberOfComments').html("Based on " + data.length + " Comments");

    } else {
        $('#score').html('No comments yet..');
        $("#score-ratt").html('No score');
        $('#numberOfComments').html("");
    }
}

function showDeleteButtonForAdmin(id_comment) {
    console.log(idRole)
    if (idRole == 1) {
        return `<button class="remove" onclick="deleteComment(${id_comment})"><i class="fa fa-trash-o"></i></button>`;
    } else {
        return '';
    }
}

function deleteComment(id_comment) {
    $.ajax({
        url: appentToUrl('/api/deleteComment'),
        method: "delete",
        data: {
            id_comment: id_comment
        },
        success: function () {
            getAllReviewsForOneGame();
            swal("Nice!", "Review has been deleted", "success");
        },
        error: function (xhr ,status, error) {
            console.log(error);
        }
    });
}


function clearReview() {{
    var stars = $('#stars li').parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }
    $('#your-review').val('');
}}


//login Page
$("#showReset").click(function (e) {
    e.preventDefault();
    $("#popupReset").css("display", "block");
    $(this).css("position", "static");

});

$("#reset_cancel").click(function () {
    $("#popupReset").css("display", "none");
    $("#showReset").css("position", "absolute");
});
//end login page




//wish page
if(pageUrl.indexOf("wishlist") != -1){
    getAllWishesForOneUser();
}

function getAllWishesForOneUser() {
    $.ajax({
        url: '/api/wishlist',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            printAllWishes(data);
            numberOfWishes();
        },
        error: function (xhr, status, error) {
            console.log(error);
        }

    })
}



$('.addWish').click(addWish);
$(document).on('click', '.deleteWish', function (e) {
    e.preventDefault();

    let idWish = $(this).data('idwish');

    $.ajax({
        url: 'api/deleteWish',
        method: 'DELETE',
        data: {
            idWish: idWish
        },
        success: function () {
            getAllWishesForOneUser();
            swal("Good job!", "You have removed wish.", "success");
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
});

function addWish() {
    let idGame = $(this).data('idgame');

    $.ajax({
        url: '/api/addWish',
        method: "POST",
        data: {
            idGame: idGame
        },
        statusCode: {
            200: function (data) {
                swal(data, '',  "info");
            },
            201: function (data) {
                swal("Good job!", data, "success");
            }
        },
        success: function () {
            numberOfWishes();
        },
        error: function (xhr, status, error) {
            status = xhr.status;
            if(status === 404) {
                swal("You must login to achive wish command", '', "error");
            }

        }
    })
}

//funkcaj za printovanje zelja jednog korisnika
function printAllWishes(data) {
    let html = '';

    data.forEach(d => {
        html += `
           <tr>
                <td class="pro-thumbnail"><a href="games/${d.id_game}"><img src="/assets/images/product/${d.photos[0].single_photo}" alt="${d.game_name}"></a></td>
                <td class="pro-title"><a href="games/${d.id_game}">${d.game_name}</a></td>
                <td class="pro-price"><span>$${calculatePrice(d.price, d.discount)}</span></td>
                <td class="pro-addtocart"><button><a href="games/${d.id_game}" style="color: #000000">Visit</a></button></td>
                <td class="pro-remove"><a href="#" class="deleteWish" data-idwish="${d.id_wish}"><i class="fa fa-trash-o"></i></a></td>
            </tr>
        `
    });


    $('#wishlist').html(html);
}

function calculatePrice(price, discount) {
    if(!discount) {
        return  price;
    } else {
        return parseInt(price) - discount/100*parseInt(price);
    }
}

function numberOfWishes() {
    $.ajax({
        url: appentToUrl('/api/numberOfWishes'),
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            $('#numberOfWishes').html(data);
        },
        error: function (xhr ,status, error) {
            console.log(error);
        }
    })
}

//end wish page


// cart page
function prikaziKorpu(){
    let products = gamesUkorpi();
    let idsProd = [];
    let sumQuantity = 0;
    let totalPrice = 0;

    for (let prod of products){
        idsProd.push(prod.id);
        sumQuantity += prod.quantity;
    }

    if(products.length === 0) {

        pokaziPraznuKorpu();

    } else {
        $("#numberOfCartProd").html(sumQuantity);
        $.ajax({
            url: appentToUrl("/api/getProductsForCart"),
            method: "GET",
            dataType: "json",
            data: {
                idsProd: idsProd
            },
            statusCode: {
                404: function () {
                    obrisiCeluKorpu();
                }
            },
            success: function(data){

                data = data.filter(p=>{
                    for (let prod of products){
                        if(p.id_game == prod.id){
                            p.quantity = prod.quantity;
                            totalPrice += calculatePrice(p.price, p.discount) * p.quantity;
                            return true;}
                    }
                    return false;
                });
                $("#totalPrice").html("$" + totalPrice);
                napraviTabelu(data);
            }
        });
    }

}

function napraviTabelu(data){
    let html = '';

    for(let p of data){
        html += napraviTr(p);
    }

    $("#cart-products").html(html);

    function napraviTr(p){
        return ` <li>
                    <a class="image" href="${ appentToUrl("/games/" +p.id_game) }"><img src="${rootUrl + "/assets/images/product/" + p.photos[0].single_photo}" alt="Product"></a>
                    <div class="content">
                        <a href="${ appentToUrl("/games/" +p.id_game) }" class="title">${p.game_name}</a>
                        <span class="price">Price: $${calculatePrice(p.price, p.discount)}</span>
                        <span class="qty">Qty: ${p.quantity}</span>
                    </div>
                    <button class="remove" onclick='obrisiKorpu(${p.id_game})'><i class="fa fa-trash-o"></i></button>
                </li>`
    }

}
function pokaziPraznuKorpu(){
    $("#cart-products").html ("<h1>Your cart is empty!</h1>");
    $("#numberOfCartProd").html('0');
    $("#totalPrice").html("$" + 0);
}

function gamesUkorpi(){
    return JSON.parse(localStorage.getItem("products"));
}

function obrisiKorpu(id){
    let products = gamesUkorpi();
    let filtered = products.filter(p => p.id != id);

    localStorage.setItem("products", JSON.stringify(filtered));


    prikaziKorpu();
}

let products = gamesUkorpi();

if(products === null){
    pokaziPraznuKorpu();}
else{
    prikaziKorpu();
}


function obrisiCeluKorpu() {
    localStorage.removeItem('products');
}





    $(".auth").click(dodajUkorpu);
    $(".nauth").click(function () {
        swal("You must login to achive cart command", '', "error");
    });


function dodajUkorpu(){
    let id = $(this).data("idgame");

    var products = gamesUkorpi();

    if(products) {
        if(gamesVecUKorpi()) {
            dodajgames();
        } else {
            dodajUlocalStorage()
        }
    } else {
        dodajPrviGame();
    }
    swal("Game has been added to cart!", "", "success");
    prikaziKorpu();

    function gamesVecUKorpi() {
        return products.filter(p => p.id == id).length;
    }

    function dodajUlocalStorage() {
        let products = gamesUkorpi();
        products.push({
            id : id,
            quantity : 1
        });


        localStorage.setItem("products", JSON.stringify(products));
    }

    function dodajgames() {
        let products = gamesUkorpi();
        for(let i in products)
        {
            if(products[i].id == id) {
                products[i].quantity++;
                break;
            }
        }

        localStorage.setItem("products", JSON.stringify(products));
    }


    function dodajPrviGame() {
        let products = [];
        products[0] = {
            id : id,
            quantity : 1
        };
        localStorage.setItem("products", JSON.stringify(products));
    }
}



//subscribe

$('#subscribeToNews').click(addSubscriber);

function addSubscriber() {
    let email = $('#mc-email').val();

    $.ajax({
        url: appentToUrl('/api/addSubscriber'),
        method: 'POST',
        data: {
            email, email
        },
        statusCode: {
          500: function () {
              swal('We will fix this ASAP', '', "error");
          }
        },
        success: function () {
            swal('Thank You', 'You have successfully subscribed.', 'success');
            $('#mc-email').val('');
        },
        error: function (data) {
            responseOfRequest(data);
        }
    });

}


$('#sendContact').click(sendContact);

function sendContact() {
    let email = $("#email-contact").val();
    console.log(email)
    let message = $("#message").val();

    $.ajax({
        url: appentToUrl('/api/sendContact'),
        method: 'POST',
        data: {
            email: email,
            message: message
        },
        success: function () {
            swal('Thanks for contacting us.', '', 'success');
        },
        error: function (data) {
            responseOfRequest(data);
        }
    });
}


//Checkout functions

$('.checkout').click(checkout);

function checkout() {
    let products = gamesUkorpi();
    let idsProd = [];
    let sumQuantity = 0;

    if (products) {
        $.ajax({
            url: appentToUrl('/api/addToOrders'),
            method: 'POST',
            data: {
                products: products
            },
            success: function () {
                swal('', 'Your order is on pending, You will recive mail when we approve purchase.', 'success');
                obrisiCeluKorpu();
                pokaziPraznuKorpu();
            },
            error: function (data) {
                swal('We will fix this ASAP', '', 'error');
                //Zelim da vratim defaultnu gresku zato sto korisnik ne unosi sam podatke u array ali ako pokusa neke mutne radnje nad localstorage onda ce uci u error -- request validira svaki element niza products
                // responseOfRequest(data);
            }

        });
    } else {
        swal('Your cart is empty', '', 'info');
    }

}
