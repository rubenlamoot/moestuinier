
// window.onload(function () {
    var d = new Date();
    var maand = d.getMonth();
    var next_month = 0;
    var prev_month = 0;
    var arrayMaand = [];

    arrayMaand = vindMaand(maand);

    $(".txtMaand").html(arrayMaand[0]);
    $(".homepic").attr('src', arrayMaand[1]);
    $(".tekstMaand").html(arrayMaand[2]);


    $(".fa-chevron-circle-left").click(function () {
        if (maand === 0){
            next_month = maand + 1;
            prev_month = 11;
        }
        else if (maand === 11){
            next_month = 0;
            prev_month = maand - 1;
        }
        else{
            next_month = maand + 1;
            prev_month = maand - 1;
        }
        arrayMaand = [];
        arrayMaand = vindMaand(prev_month);

        $(".txtMaand").html(arrayMaand[0]);
        $(".homepic").attr('src', arrayMaand[1]);
        $(".tekstMaand").html(arrayMaand[2]);

        maand = prev_month;
    });

    $(".fa-chevron-circle-right").click(function () {
        if (maand === 0){
            next_month = maand + 1;
            prev_month = 11;
        }
        else if (maand === 11){
            next_month = 0;
            prev_month = maand - 1;
        }
        else{
            next_month = maand + 1;
            prev_month = maand - 1;
        }
        arrayMaand = [];
        arrayMaand = vindMaand(next_month);

        $(".txtMaand").html(arrayMaand[0]);
        $(".homepic").attr('src', arrayMaand[1]);
        $(".tekstMaand").html(arrayMaand[2]);

        maand = next_month;
    });
 // });

function vindMaand(maandGetal){
    var str_maand;
    var str_src;
    var str_tekst;
    var eenArray = [];
    switch (maandGetal) {
        case 0 :
            str_maand = 'Januari';
            str_src = 'images/home/januari.jpg';
            str_tekst = 'De lente lijkt nog heel ver weg, zo hartje winter. Maar bij een knetterend haardvuur plannen maken, zaden bestellen en dromen van een volle moestuin is eigenlijk ook een beetje moestuinieren - mentaal dan.';
            break;
        case 1 :
            str_maand = 'Februari';
            str_src = 'images/home/februari.jpg';
            str_tekst = 'Februari is de maand van de hoop: aan kleine dingetjes kun je zien dat de lente op komst is. Het lengen van de dagen, de eerste bloembollen die bovenkomen en nu en dan al eens een warme dag...';
            break;
        case 2 :
            str_maand = 'Maart';
            str_src = 'images/home/maart.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 3 :
            str_maand = 'April';
            str_src = 'images/home/april.JPG';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 4 :
            str_maand = 'Mei';
            str_src = 'images/home/mei.JPG';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 5 :
            str_maand = 'Juni';
            str_src = 'images/home/juni.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 6 :
            str_maand = 'Juli';
            str_src = 'assets/images/juli.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 7 :
            str_maand = 'Augustus';
            str_src = 'images/home/augustus.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 8 :
            str_maand = 'September';
            str_src = 'assets/images/september.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 9 :
            str_maand = 'Oktober';
            str_src = 'images/home/oktober.JPG';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 10 :
            str_maand = 'November';
            str_src = 'images/home/november.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
        case 11 :
            str_maand = 'December';
            str_src = 'assets/images/december.jpg';
            str_tekst = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, asperiores autem consectetur debitis deserunt ea earum eius illum ipsam mollitia natus numquam ...';
            break;
    }
    eenArray.push(str_maand);
    eenArray.push(str_src);
    eenArray.push(str_tekst);
    return eenArray;
}

function goBack()
{
    window.history.back()
}

