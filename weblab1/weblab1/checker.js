let x, y, r;
function isNum(n) {
    let regexp = /^-?\d[\.,]?\d*$/;
    let val = regexp.test(n);
    return val;
}
function checkX() {
    x = document.getElementsByName("Xbtn")[0].value;
    if (isNum(x.toString()) && x.length > 0) {
        x = x.replace(',', '.');
        x = parseFloat(x);
        return (x <= 3 && x >= -5) && !isNaN(x);
    }
    return false
}
function checkY() {
    y = document.getElementsByName("Ybtn")[0].value;
    if (isNum(y.toString()) && y.length > 0) {
        y = y.replace(',', '.');
        y = parseFloat(y);
        return (y <= 3 && y >= -5) && !isNaN(y);
    }
}
function check() {
    if (checkX() && checkY()) {
        alert("Кнопка разблокирована");
        document.getElementById('button').disabled = false;
    } else {
        document.getElementById('button').disabled = true;
    }
}

