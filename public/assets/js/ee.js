//constanta koja sadrzi url adresu
const pageUrl = window.location.href;
const rootUrl = document.location.hostname + ":" +document.location.port;

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
                <td class="pro-thumbnail"><a href="games/${d.id_game}"><img src="${d.photos[0].single_photo}" alt="${d.game_name}"></a></td>
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
            url: "api/getProductsForCart",
            method: "GET",
            dataType: "json",
            data: {
                idsProd: idsProd
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
                    <a class="image" href="games/${p.id_game}"><img src="${p.photos[0].single_photo}" alt="Product"></a>
                    <div class="content">
                        <a href="games/${p.id_game}" class="title">${p.game_name}</a>
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






    $(".auth").click(dodajUkorpu);
    $(".nauth").click(function () {
        swal("You must login to achive wish command", '', "error");
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

